@extends('layouts.legacyapp')

<?php
    define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
    $requestProtocol = $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ? 'http://' : 'https://';
    define("ROOT_WWW", $requestProtocol  . $_SERVER['HTTP_HOST']);
?>

@section('content')
    <script src="https://d3js.org/d3.v5.min.js"></script>

    <!-- PARTICIPANTS -->

    <?php
//        $data = \App\Http\Controllers\RegistrationLegacyController::getEventnameParticipantCountForAll();
        $data = \App\Http\Controllers\RegistrationController::getEventnameParticipantCountForAll();
        $data_json = json_encode($data);
    ?>

    <div id="participants" class="canvas">
        <h2 class="mb-3">Anzahl Teilnehmer pro Stammtisch</h2>
    </div>

    <script>

        const datasource = <?= $data_json ?>;
        // console.log(datasource);
        // console.log(datasource[2].participants);

        const svg = d3.select('#participants')
            .append('svg')
            .attr('width', 1100)
            .attr('height', 600);

        const margin = {top: 20, right: 20, bottom: 100, left:100};
        const graphWidth = 1100 - margin.left - margin.right;
        const graphHeight = 600 - margin.top - margin.bottom;

        const graph = svg.append('g')
            .attr('width', graphWidth)
            .attr('height', graphHeight)
            .attr('transform', `translate(${margin.left},${margin.top})`);

        const xAxisGroup = graph.append('g')
            .attr('transform', `translate(0,${graphHeight})`);
        const yAxisGroup = graph.append('g');

        const y = d3.scaleLinear()
            .domain([0,d3.max(datasource, d => Number(d.participants))])
            .range([graphHeight,0]);

        const x = d3.scaleBand()
            .domain(datasource.map(item => item.event))
            .range([0,graphWidth])
            .paddingInner(0.2)
            .paddingOuter(0.2);

        const rects = graph.selectAll('rect')
            .data(datasource)
            .attr('width', x.bandwidth )
            .attr('height', d => graphHeight - y(d.participants))
            .attr('fill','blue')
            .attr('x', d => x(d.event))
            .attr('y', d => y(d.participants));

        rects.enter()
            .append('rect')
            .attr('width', x.bandwidth )
            .attr('height', 0)
            .attr('fill', function(d) {
                if(d.event == "2019-12" || d.event == "2020-01"|| d.event == "2020-02" || d.event == "2020-08") {
                    return "#0000dd";
                }
                if(d.event == "2020-04" || d.event == "2020-05" || d.event == "2020-11" || d.event == "2021-01" || d.event == "2021-02" || d.event == "2021-04") {
                    return "#aaaaff";
                }
                return "#999";
            })
            .attr('x', d => x(d.event))
            .attr('y', graphHeight)
            .transition().duration(800)
            .attr('y', d => y(d.participants))
            .attr('height', d => graphHeight - y(d.participants));

        const xAxis = d3.axisBottom(x);
        const yAxis = d3.axisLeft(y);
        xAxisGroup.call(xAxis);
        yAxisGroup.call(yAxis);
    </script>

    <!-- PAGEVIEWS -->

    <div id="pageviews" class="canvas">
        <h2 class="mb-3">Pageviews pro Tag</h2>
        <p>Total: <?= \App\Http\Controllers\LogLegacyController::get_pageviews_total(); ?><br>
            Chart cutoff at 100 views</p>
    </div>

    <?php
        $dataPageviews = \App\Http\Controllers\LogLegacyController::get_pageviews();
        $dataPageviews_json = json_encode($dataPageviews);
    ?>
    <script>
        const datasourcePageviews = <?= $dataPageviews_json ?>;
        const svgPageviews = d3.select('#pageviews')
            .append('svg')
            .attr('width', 1100)
            .attr('height', 600);

        const marginPageviews = {top: 20, right: 20, bottom: 100, left:100};
        const graphWidthPageviews = 1100 - marginPageviews.left - marginPageviews.right;
        const graphHeightPageviews = 600 - marginPageviews.top - marginPageviews.bottom;

        const graphPageviews = svgPageviews.append('g')
            .attr('width', graphWidthPageviews)
            .attr('height', graphHeightPageviews)
            .attr('transform', `translate(${marginPageviews.left},${marginPageviews.top})`);

        const xAxisGroupPageviews = graphPageviews.append('g')
            .attr('transform', `translate(0,${graphHeightPageviews})`);
        const yAxisGroupPageviews = graphPageviews.append('g');

        const yPageviews = d3.scaleLinear()
            .domain([0,100])
            .range([graphHeightPageviews,0]);

        var dateMin = new Date(datasourcePageviews[0].day);
        var dateMax = new Date(datasourcePageviews[datasourcePageviews.length - 1].day);
        const xPageviews = d3.scaleTime()
            .domain([dateMin, dateMax])
            .range([0,graphWidthPageviews]);


        const rectsPageviews = graphPageviews.selectAll('rect')
            .data(datasourcePageviews)
            .attr('width', 10)
            .attr('height', d => graphHeightPageviews - yPageviews(d.pageviews))
            .attr('fill','blue')
            .attr('x', d => xPageviews(new Date(d.day)) - 2)
            .attr('y', d => yPageviews(d.pageviews));

        rectsPageviews.enter()
            .append('rect')
            .attr('width', 4)
            .attr('height', 0)
            .attr('fill','blue')
            .attr('x', d => xPageviews(new Date(d.day)) - 2)
            .attr('y', graphHeightPageviews)
            .transition().duration(800)
            .attr('y', d => yPageviews(d.pageviews))
            .attr('height', d => graphHeightPageviews - yPageviews(d.pageviews));

        const xAxisPageviews = d3.axisBottom(xPageviews)
            .ticks(8);
        const yAxisPageviews = d3.axisLeft(yPageviews);
        xAxisGroupPageviews.call(xAxisPageviews);
        yAxisGroupPageviews.call(yAxisPageviews);

        xAxisGroupPageviews.selectAll('text')
            .attr('transform', 'rotate(-60)')
            .attr('text-anchor', 'end');
    </script>
@endsection
