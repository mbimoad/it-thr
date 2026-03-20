<section class="main">

<div class="sticky-menu">
    <h2>Library</h2>

    <div class="menu">
        <div class="buttons">
            <button class="active">All</button>
            <button>Dekstop</button>
            <button>Mobile</button>
        </div>
        <div class="input">
            <div class="search">
                <input type="text" placeholder="Search" class="custom-search">
                <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/search.svg">
            </div>


            <div class="sort">
                <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/sort.svg" class="sort-btn">
                <div class="popup">
                    <div class="item active" >
                        <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/check.svg" alt="">
                        <span>Sort By Date</span>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/check.svg" alt="">
                        <span>Sort By Name</span>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>assets/tapstore/frontend/svg/check.svg" alt="">
                        <span>Sort By Category</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="libraries">
    <table id="myTable" class="display">
        <thead>
            <tr style="display: none;">
                <th>Application</th>
                <th>Categories</th>
                <th>Creation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</section>