<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title><?php echo $datas["title"]; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/tapstore/frontend/styles/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
</head>
    <body class="light <?php echo ($datas["title"] == "detail") ? 'hero' : ''; ?>" data-base_url="<?php echo base_url(); ?>">
    
    <header>
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/app.svg">
            <span>TT-IT Store</span>
        </div>

        <div class="finder">
            <input type="text" placeholder="Search apps, website and etc">
            <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/search.svg" class="svgimg">
        </div>

        <div class="user">
            <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/user.svg" class="svgimg">
            <div class="user-info">
                <p>TT24010584</p>
                <span>Muhammad Bimoadjie Dwintoro</span>
            </div>
            <a href="/tkgsdh/tkgplaystore/login" class="loginbtn">Login</a>
        </div>



        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>


    <aside>
        <ul>
            <li class="active">
                <img class="svgimg" src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/home.svg">
                <span href="#">Home</span>
            </li>
            <li>
                <img class="svgimg" src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/desktop.svg">
                <span href="#">Desktop</span>
            </li>
            <li>
                <img class="svgimg" src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/mobile.svg">
                <span href="#">Mobile</span>
            </li>
        </ul>

        <ul>
            <li>
                <img class="svgimg" src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/darkmode.svg">
                <span href="#">Dark Mode</span>
            </li>
            <li>
                <img class="svgimg" src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/download.svg">
                <span href="#">Downloads</span>
            </li>
            <li>
                <img class="svgimg" src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/library.svg">
                <span href="#">Library</span>
            </li>
        </ul>
    </aside>