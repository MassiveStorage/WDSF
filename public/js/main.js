var currentSlide = -1;
var maxSlides = 0;
var slides;
var skipSlide = false;

stepDirection = {
    FORWARD : 1,
    BACKWARD : -1
};

function handleStepCount(direction) {
    currentSlide += direction;
    if (currentSlide === maxSlides)
            currentSlide = 0;
    if (currentSlide < 0)
        currentSlide = maxSlides - 1;
}

function printTableData(tableData) {
    var html = "";
    html = "<tr>";
    for(i = 0; i < tableData.header.length; ++i) {
        html += "<th>" + tableData.header[i] + "</th>";
    }
    for(i = 0; i < tableData.rows.length; ++i) {
        html += "<tr>";
        for(x = 0; x < tableData.rows[i].length; ++x) {
            html += "<td>" + tableData.rows[i][x] + "</td>";
        }
        html +="</tr>";
    }
    
    return html;
}

function step(direction) {
    handleStepCount(direction);
    $.ajax({
        url: "public/html/slideTemplate.html",
        method: "GET"
    }).done(function(html) {
        templateHTML = html;
        $.ajax({
            url: slides.data[currentSlide].substring(1),
            method: "GET"
        }).done(function(html) {
            $("div.slide").remove();    
            $("#wrapper").append(templateHTML);
            
            jsonObj = JSON.parse(html);
            content = printTableData(jsonObj);
            $(".slide > table").append(content);
        });
    });
}
function doSkipSlide(direction) {
    step(direction);
    skipSlide = true;
}

$(document).click(function() {
    doSkipSlide(stepDirection.FORWARD);
});

$(document).keypress(function (e) {
    if(e.key === "ArrowLeft") {
        doSkipSlide(stepDirection.BACKWARD);
    }
    if(e.key === "ArrowRight" || e.key === " ") {
        doSkipSlide(stepDirection.FORWARD);
    }
});

function initSlideShow() {
     $.ajax({
        async:false,
        url: "getSlideList",
        method: "GET"
    }).done(function(html) {
        slides = JSON.parse(html);
        maxSlides = slides.data.length;
    });
}

$(document).ready(function () {
    initSlideShow();
    step(stepDirection.FORWARD);
    window.setInterval(function() {
        step(stepDirection.FORWARD);
    }, 10000);
});

