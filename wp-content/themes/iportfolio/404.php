<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="not_found_sec" style="background-image: url('https://jenish-portfolio.000.pe/wp-content/uploads/2024/11/rainforest-612x422-1.jpg');">
    <div class="not_content">
        <h1>404</h1>
        <p>Sorry, but the page you are looking for does not exist.</p>
        <a href="<?php echo home_url(); ?>" class="onze-werking" target="">Home<i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>
<style>
    body {
        margin: 0px;
        padding: 0px;
    }
    section.not_found_sec {
        height: 100vh;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        /* padding: 100px 18%; */
        position: relative;
        display: flex;
        justify-content: flex-start;
        align-items: flex-end;
        z-index: 0;
    }

    section.not_found_sec h1,
    section.not_found_sec p {
        color: #fff;
    }

    .not_content {
        position: absolute;
        top: 50%;
        left: 155px;
        transform: translateY(35%);
    }

    .not_content a {
        border-radius: 27px;
        background-color: #f6f4f0;
        padding: 14px 35px;
        color: #1a1a1a !important;
        font-size: 15px;
        line-height: 17px;
        font-family: "AzoSans-Bold" !important;
        font-weight: normal;
        transition: 0.5s all;
        margin-top: 25px;
        text-decoration: none !important;
        display: block;
        width: fit-content;
    }

    .not_content a i {
        margin-left: 9px;
        -webkit-transition: 0.5s all;
    }
</style>