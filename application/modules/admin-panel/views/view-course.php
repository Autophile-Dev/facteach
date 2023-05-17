<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.css'); ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Courses</title>
</head>

<body>
    <div class="admin-main">
        <div class="admin-sub-main">
            <div class="sidebar">
                <div class="inner-sidebar">
                    <div class="icon">
                        <svg width="42" height="41" viewBox="0 0 42 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.8843 0.886257C28.183 1.35559 28.439 1.99559 28.6523 2.80626C28.9083 3.57426 29.0363 4.38492 29.0363 5.23825C29.0363 6.90226 28.6737 8.09692 27.9483 8.82226C27.2657 9.50492 26.327 9.84626 25.1323 9.84626H11.6923V17.0783H25.7083C26.0497 17.5476 26.327 18.1663 26.5403 18.9343C26.7963 19.7023 26.9243 20.5129 26.9243 21.3663C26.9243 22.9876 26.5617 24.1609 25.8363 24.8863C25.1537 25.5689 24.215 25.9103 23.0203 25.9103H11.8203V39.4143C11.351 39.5423 10.6043 39.6703 9.58033 39.7983C8.59899 39.9263 7.61766 39.9903 6.63633 39.9903C5.65499 39.9903 4.78033 39.9049 4.01233 39.7343C3.28699 39.6063 2.66833 39.3503 2.15633 38.9663C1.64433 38.5823 1.26033 38.0489 1.00433 37.3663C0.748327 36.6836 0.620327 35.7876 0.620327 34.6783V6.83826C0.620327 5.00359 1.15366 3.55292 2.22033 2.48626C3.28699 1.41959 4.73766 0.886257 6.57233 0.886257H27.8843ZM29.3058 34.4863C29.3058 32.6943 29.8605 31.2009 30.9698 30.0063C32.0792 28.8116 33.5938 28.2143 35.5138 28.2143C37.4338 28.2143 38.9485 28.8116 40.0578 30.0063C41.1672 31.2009 41.7218 32.6943 41.7218 34.4863C41.7218 36.2783 41.1672 37.7716 40.0578 38.9663C38.9485 40.1609 37.4338 40.7583 35.5138 40.7583C33.5938 40.7583 32.0792 40.1609 30.9698 38.9663C29.8605 37.7716 29.3058 36.2783 29.3058 34.4863Z"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="options">



                        <div class="option-list">
                            <div class="nav-icon">
                                <a class="icon-shift" href="<?= base_url('index.php/admin/admin-dashboard') ?>">
                                    <svg class="svg-icon"
                                        style="width: 36px; height: 36px;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M586.3424 385.536H742.4V281.6h-156.0576v103.936z m-25.6-155.136H768a25.6 25.6 0 0 1 25.6 25.6v155.136a25.6 25.6 0 0 1-25.6 25.6h-207.2576a25.6 25.6 0 0 1-25.6-25.6V256a25.6 25.6 0 0 1 25.6-25.6z m181.6576 512v-206.9504h-156.0576V742.4H742.4z m-207.2576 25.6V509.8496a25.6 25.6 0 0 1 25.6-25.6H768a25.6 25.6 0 0 1 25.6 25.6V768a25.6 25.6 0 0 1-25.6 25.6h-207.2576a25.6 25.6 0 0 1-25.6-25.6z m-97.4848-25.6v-103.936H281.6v103.936h156.0576zM230.4 768v-155.136a25.6 25.6 0 0 1 25.6-25.6h207.2576a25.6 25.6 0 0 1 25.6 25.6V768a25.6 25.6 0 0 1-25.6 25.6H256a25.6 25.6 0 0 1-25.6-25.6z m207.2576-279.4496V281.6H281.6v206.9504h156.0576z m-207.2576 25.6V256a25.6 25.6 0 0 1 25.6-25.6h207.2576a25.6 25.6 0 0 1 25.6 25.6v258.1504a25.6 25.6 0 0 1-25.6 25.6H256a25.6 25.6 0 0 1-25.6-25.6z" />
                                    </svg>
                                </a>
                            </div>
                            <!-- <div class="nav-name">Dashboard</div> -->
                        </div>
                        <!-- add -->

                        <div class="option-list">
                            <div class="nav-icon">
                                <a class="icon-shift" href="<?= base_url('index.php/admin/add-course') ?>">
                                    <svg class="svg-icon"
                                        style="width: 32px; height: 32px;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M512 1024a512 512 0 1 1 512-512 512 512 0 0 1-512 512z m0-981.333333a469.333333 469.333333 0 1 0 469.333333 469.333333A469.333333 469.333333 0 0 0 512 42.666667z m256 490.666666H533.333333v234.666667a21.333333 21.333333 0 0 1-42.666666 0V533.333333H256a21.333333 21.333333 0 0 1 0-42.666666h234.666667V256a21.333333 21.333333 0 0 1 42.666666 0v234.666667h234.666667a21.333333 21.333333 0 0 1 0 42.666666z" />
                                    </svg>
                                </a>
                            </div>
                            <!-- <div class="nav-name">Add Course</div> -->
                        </div>


                        <!-- view -->
                        <div class="option-list">
                            <div class="nav-icon">
                                <a class="icon-shift" href="<?= base_url('index.php/admin/courses') ?>">
                                    <svg class="svg-icon"
                                        style="width: 36px; height: 36px;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M512.042667 682.666667c-94.122667 0-170.666667-76.544-170.666667-170.666667s76.544-170.666667 170.666667-170.666667 170.666667 76.544 170.666666 170.666667-76.586667 170.666667-170.666666 170.666667z m0-298.666667c-70.570667 0-128 57.429333-128 128s57.429333 128 128 128 128-57.429333 128-128-57.429333-128-128-128z" />
                                        <path
                                            d="M512.042667 810.666667C267.989333 810.666667 66.56 603.562667 10.666667 540.074667a42.922667 42.922667 0 0 1-0.085334-56.106667C66.517333 420.48 267.989333 213.333333 512.042667 213.333333c243.797333 0 445.098667 206.72 501.205333 270.378667l0.256 0.298667c13.866667 15.957333 13.866667 40.021333 0 55.978666C957.525333 603.52 756.053333 810.666667 512.042667 810.666667z m0-554.666667C285.909333 256 95.573333 452.010667 42.666667 512.128 95.616 571.989333 285.866667 768 512.042667 768c226.133333 0 416.426667-196.010667 469.376-256.128C928.426667 452.010667 738.133333 256 512.042667 256z" />
                                    </svg>
                                </a>
                            </div>
                            <!-- <div class="nav-name">Add Course</div> -->
                        </div>
                    </div>
                    <!-- Logout -->
                    <div class="icon">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.6939 20.5155V22.555C18.6939 24.8042 16.8641 26.634 14.6149 26.634H4.36628C2.11703 26.634 0.287231 24.8042 0.287231 22.555V4.60719C0.287231 2.35793 2.11703 0.528137 4.36628 0.528137H14.6149C16.8641 0.528137 18.6939 2.35793 18.6939 4.60719V6.64671C18.6939 7.20997 18.2374 7.66647 17.6742 7.66647C17.1109 7.66647 16.6544 7.20997 16.6544 6.64671V4.60719C16.6544 3.48266 15.7394 2.56766 14.6149 2.56766H4.36628C3.24175 2.56766 2.32676 3.48266 2.32676 4.60719V22.555C2.32676 23.6795 3.24175 24.5945 4.36628 24.5945H14.6149C15.7394 24.5945 16.6544 23.6795 16.6544 22.555V20.5155C16.6544 19.9522 17.1109 19.4957 17.6742 19.4957C18.2374 19.4957 18.6939 19.9522 18.6939 20.5155ZM25.6464 11.8294L23.3629 9.54586C22.9646 9.14752 22.3189 9.14752 21.9207 9.54586C21.5224 9.94401 21.5224 10.5897 21.9207 10.9879L23.545 12.6123H11.3007C10.7374 12.6123 10.2809 13.0688 10.2809 13.6321C10.2809 14.1953 10.7374 14.6518 11.3007 14.6518H23.545L21.9207 16.2763C21.5224 16.6744 21.5224 17.3202 21.9207 17.7183C22.1199 17.9175 22.3808 18.0171 22.6417 18.0171C22.9028 18.0171 23.1638 17.9175 23.3629 17.7183L25.6464 15.4348C26.6405 14.4407 26.6405 12.8234 25.6464 11.8294Z"
                                fill="white" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class="context-box">
                <div class="head-title">Courses</div>
                <div class="all-courses">
                    <?php foreach ($courses as $course): ?>
                        <div class="list-course-container">
                            <div class="image-box">
                                <!-- image -->
                                <svg width="23" height="33" viewBox="0 0 23 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_283)">
                                        <path
                                            d="M6.16677 32.634C9.11077 32.634 11.5005 30.2443 11.5005 27.3003V21.9665H6.16677C3.22277 21.9665 0.833008 24.3563 0.833008 27.3003C0.833008 30.2443 3.22277 32.634 6.16677 32.634Z"
                                            fill="#0ACF83" />
                                        <path
                                            d="M0.833008 16.634C0.833008 13.69 3.22277 11.3003 6.16677 11.3003H11.5005V21.9664H6.16677C3.22277 21.9677 0.833008 19.578 0.                                         833008 16.634Z"
                                            fill="#A259FF" />
                                        <path
                                            d="M0.833008 5.96779C0.833008 3.02379 3.22277 0.634033 6.16677 0.634033H11.5005V11.3003H6.16677C3.22277 11.3003 0.833008 8.                                           91179 0.833008 5.96779Z"
                                            fill="#F24E1E" />
                                        <path
                                            d="M11.4992 0.634033H16.833C19.777 0.634033 22.1668 3.02379 22.1668 5.96779C22.1668 8.91179 19.777 11.3003 16.833 11.3003H11.                                         4992V0.634033Z"
                                            fill="#FF7262" />
                                        <path
                                            d="M22.1668 16.634C22.1668 19.578 19.777 21.9678 16.833 21.9678C13.889 21.9678 11.4992 19.578 11.4992 16.634C11.4992 13.69 13.                                            889 11.3003 16.833 11.3003C19.777 11.3003 22.1668 13.69 22.1668 16.634Z"
                                            fill="#1ABCFE" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_283">
                                            <rect width="21.3338" height="32" fill="white"
                                                transform="translate(0.833008 0.634033)" />
                                        </clipPath>
                                    </defs>
                                </svg>


                            </div>
                            <!-- course name flex col -->
                            <div class="course-info">
                                <span class="course-name-head">
                                    <?php echo $course->course_name; ?>
                                </span>
                                <span class="course-name-about">
                                    <?php echo $course->course_instructor; ?>
                                </span>
                            </div>
                            <!-- time -->
                            <!-- button -->
                            <a href="<?php echo base_url('index.php/view/' . $course->course_id); ?>">
                                <div class="view-course-button">
                                    View course
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

    * {
        padding: 0;
        margin: 0;
    }

    .course-name-head {
        color: #f5f5f5;
    }
.course-name-about{
    color: #f5f5f5;
}
    .head-title {
        font-family: 'Roboto';
        /* font-style: normal; */
        font-weight: bolder;
        font-size: 64px;
        color: #f5f5f5;
        line-height: 102px;
    }

    .context-box {
        width: 100%;
        margin-top: 10px;
        display: flex;
        padding: 0px 25px 0px 0px;
        flex-direction: column;
    }

    .admin-main {

        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        background: #171721;
    }

    .icon-shift {
        color: #f5f5f5;
    }

    .admin-sub-main {
        width: 100%;
        display: flex;
        min-height: 100vh;
        gap: 25px;
    }

    .sidebar {
        gap: 24px;
        display: flex;
    }

    .inner-sidebar {
        width: 124px;
        border-radius: 24px;
        display: flex;
        flex-direction: column;
        transition-duration: 0.5s;
        background-color: #22222C;
        color: #f9fafb;
        gap: 40px;
        align-items: center;
        justify-content: space-between;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .icon {
        padding-top: 2.25rem;
        padding-bottom: 2.25rem;
        display: flex;
        justify-content: center;
    }

    .options {
        display: flex;
        flex-direction: column;
        gap: 45px;
    }

    .option-list {
        display: flex;
        justify-content: center;
        align-items: center;
        /* gap: 5px; */
        width: 100%;
    }

    .nav-name {
        font-family: "Roboto", sans-serif;
        font-weight: 400;
        font-size: 16px;
        /* line-height: 57px; */
        /* white-space: pre; */
        color: #f5f5f5;
    }

    .context-box {
        display: flex;
        width: 100%;
    }

    .list-course-container {
        background: #22222C;
        border-radius: 14px;
        display: flex;
        max-width: 100%;
        overflow: hidden;
        padding: 8px;
        align-items: center;
        justify-content: space-between;
    }

    .view-course-button {
        background: transparent;
        border-radius: 8px;
        width: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        height: 40px;
        font-family: "Roboto";
        font-style: normal;
        font-weight: 700;
        font-size: 13px;
        border: 2px solid #f5f5f5;
        line-height: 0px;
        cursor: pointer;
        color: #f5f5f5;
    }

    .view-course-button:hover {
        background: #171721;
        color: #ffffff;
        border: 2px solid #171721;
    }

    .course-section {
        margin-top: 40px;
        display: flex;
        width: 100%;
        flex-direction: column;
        gap: 16px;
    }

    .section-head {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: bolder;
        font-size: 24px;
        line-height: 38px;

        /* Black */

        color: #0C0B0B;
    }

    .all-courses {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px
    }

    #tabs {
        display: flex;
        align-items: center;
        gap: 30px;

    }

    .tab-select {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: bolder;
        font-size: 16px;
        line-height: 26px;
        /* identical to box height */

        text-decoration: none;
        /* Black */

        color: #0C0B0B;
    }

    .course-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    a {
        text-decoration: none;
    }
</style>

</html>