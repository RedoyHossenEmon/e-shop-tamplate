<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap-style Image Slider</title>
    <link rel="stylesheet" href="styles.css">

<style>
  .slider-container {
    position: relative;
    width: 600px;
    overflow: hidden;
}

.slider {
    display: flex;
    transition: transform 0.5s ease;
}

.slide {
    width: 600px;
}

img {
    max-width: 100%;
}

.pagination {
    margin-top: 10px;
    text-align: center;
}

button {
    margin: 0 10px;
}
</style>

</head>
<body>
    <div class="slider-container">
        <div class="slider">
            <div class="slide">
                <img src="image1.jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="image2.jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="image3.jpg" alt="Image 3">
            </div>
            <div class="slide">
                <img src="image1.jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="image2.jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="image3.jpg" alt="Image 3">
            </div>
            <div class="slide">
                <img src="image1.jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="image2.jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="image3.jpg" alt="Image 3">
            </div>
        </div>
        <div class="pagination">
            <button class="prev">Previous</button>
            <button class="next">Next</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

$(document).ready(function () {
    const slider = $('.slider');
    const slides = $('.slide');
    const prevButton = $('.prev');
    const nextButton = $('.next');
    let currentIndex = 0;

    nextButton.on('click', function () {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
        }
        updateSlider();
    });

    prevButton.on('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
        }
        updateSlider();
    });

    function updateSlider() {
        const translateValue = -currentIndex * 600; // 600 is the width of each slide
        slider.css('transform', `translateX(${translateValue}px)`);
    }
});

    </script>
</body>
</html>
