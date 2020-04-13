let spinner = document.getElementById('spinner');

// Encapsulate the word cloud functionality
function wordCloud(selector) {
    let width, height;
    width = $('.kt-portlet__body').innerWidth() - 20;
    height = 200;

    var fill = d3.scale.category20();
    //Construct the word cloud's SVG element
    var svg = d3.select(selector).append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");


    //Draw the word cloud
    function draw(words) {
        var cloud = svg.selectAll("g text")
            .data(words, function(d) { return d.text; })

        //Entering words
        cloud.enter()
            .append("text")
            .style("font-family", "Impact")
            .style("fill", function(d, i) { return fill(i); })
            .attr("text-anchor", "middle")
            .attr('font-size', 1)
            .text(function(d) { return d.text; });

        //Entering and existing words
        cloud
            .transition()
            .duration(600)
            .style("font-size", function(d) { return d.size + "px"; })
            .attr("transform", function(d) {
                return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
            })
            .style("fill-opacity", 1);

        //Exiting words
        cloud.exit()
            .transition()
            .duration(200)
            .style('fill-opacity', 1e-6)
            .attr('font-size', 1)
            .remove();
    }

    //Use the module pattern to encapsulate the visualisation code. We'll
    // expose only the parts that need to be public.
    return {
        update: function(words) {
            d3.layout.cloud().size([width, height])
                .words(words)
                .padding(5)
                .rotate(0)
                .font("Impact")
                .fontSize(function(d) { return d.size; })
                .on("end", draw)
                .start();
        }
    }
}

axios.post('/api/word_cloud', {
})
.then(function (response) {
    spinner.remove();
    let data = response.data;
    for(let i in data){
        let words = [];
        let obj = data[i];
        Object.keys(obj)
            .forEach(function eachKey(key) {
                words.push({
                    text: key,
                    size: obj[key] * 14
                });
            });

        var portlet_body = document.createElement('div');

        portlet_body.classList.add('kt-portlet__body');
        document.getElementById('transcript-'+i).append(portlet_body);
        $('#transcript-'+i).find('#spinner').remove();
        var myWordCloud = wordCloud(portlet_body);
        myWordCloud.update(words);
    }
})
.catch(function (error) {
    console.log(error);
});
