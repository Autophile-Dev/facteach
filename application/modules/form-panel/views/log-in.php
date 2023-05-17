<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="page-main">
        <div class="left-part">
            <!-- image -->
            <div class="logo">
                <svg width="192" height="191" viewBox="0 0 42 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M27.8843 0.886257C28.183 1.35559 28.439 1.99559 28.6523 2.80626C28.9083 3.57426 29.0363 4.38492 29.0363 5.23825C29.0363 6.90226 28.6737 8.09692 27.9483 8.82226C27.2657 9.50492 26.327 9.84626 25.1323 9.84626H11.6923V17.0783H25.7083C26.0497 17.5476 26.327 18.1663 26.5403 18.9343C26.7963 19.7023 26.9243 20.5129 26.9243 21.3663C26.9243 22.9876 26.5617 24.1609 25.8363 24.8863C25.1537 25.5689 24.215 25.9103 23.0203 25.9103H11.8203V39.4143C11.351 39.5423 10.6043 39.6703 9.58033 39.7983C8.59899 39.9263 7.61766 39.9903 6.63633 39.9903C5.65499 39.9903 4.78033 39.9049 4.01233 39.7343C3.28699 39.6063 2.66833 39.3503 2.15633 38.9663C1.64433 38.5823 1.26033 38.0489 1.00433 37.3663C0.748327 36.6836 0.620327 35.7876 0.620327 34.6783V6.83826C0.620327 5.00359 1.15366 3.55292 2.22033 2.48626C3.28699 1.41959 4.73766 0.886257 6.57233 0.886257H27.8843ZM29.3058 34.4863C29.3058 32.6943 29.8605 31.2009 30.9698 30.0063C32.0792 28.8116 33.5938 28.2143 35.5138 28.2143C37.4338 28.2143 38.9485 28.8116 40.0578 30.0063C41.1672 31.2009 41.7218 32.6943 41.7218 34.4863C41.7218 36.2783 41.1672 37.7716 40.0578 38.9663C38.9485 40.1609 37.4338 40.7583 35.5138 40.7583C33.5938 40.7583 32.0792 40.1609 30.9698 38.9663C29.8605 37.7716 29.3058 36.2783 29.3058 34.4863Z"
                        fill="white" />
                </svg>
            </div>
        </div>
        <!-- form -->
        <div class="right-part">
            <div class="internal-right">
                <span class="title-signup">Welcome to Facteach</span>

                <!-- <div id="message">

                </div> -->

                <div id="message"></div>
                <form class="form-right" id="login-user" method="post">

                    <!-- input 2 -->
                    <div class="form-input-contain">
                        <label class="form-input-label">Email</label>
                        <input id="userEmail" name="user_email" type="email" placeholder="Enter your Email here"
                            class="form-inputs">
                        <div id="user_email_error" class="error"></div>
                    </div>
                    <!-- input 3 -->
                    <div class="form-input-contain">
                        <label class="form-input-label">Password</label>
                        <input id="userPassword" type="password" name="user_password" placeholder="Enter your Password"
                            class="form-inputs">
                        <div id="user_password_error" class="error"></div>
                    </div>
                    <div class="form-button-container">
                        <div class="button-form-contain">
                            <input class="form-button" type="submit" id="register-btn" name="login-btn" value="Login">
                        </div>
                        <div class="switch-text">Didn't have an account? <a class="switcher"
                                href="<?= base_url('index.php/sign-up') ?>">Create account here.</a> </div>
                    </div>

                </form>

                <!-- button -->
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $('#login-user').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#login-user')[0]);
            // var userName = $('#userName').val();
            // if (userName.length == 0) {
            //     $('#user_name_error').html('Please enter your Full Name');
            //     return false;
            // } else {
            //     $('#user_name_error').html('');
            // }
            var userMail = $('#userEmail').val();
            if (userMail.length == 0) {
                $('#user_email_error').html('Please enter your valid Email');
                return false;
            } else {
                $('#user_email_error').html('');
            }
            var userPass = $('#userPassword').val();
            if (userPass.length == 0 && userPass.length < 6) {
                $('#user_password_error').html('Your password must be at least 6 characters long');
                return false;
            } else {
                $('#user_password_error').html('');
            }
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>index.php/form/login",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        $('#message').html('<div class="alert-success">Logging in. Please wait...</div>');
                        $('#userEmail').val('');
                        $('#userPassword').val('');
                        window.location.href = '<?php echo base_url('index.php/home'); ?>';
                    } else {
                        $('#message').html('<div class="alert-danger">Invalid Email or Password. Please try again.</div>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

    * {
        padding: 0;
        margin: 0;
    }

    #message {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert-danger {
        background-color: #ff7b7b;
        color: #a70000;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        width: 100%;
        /* line-height: 0px; */
        align-items: center;
        display: flex;
        justify-content: center;
        border-radius: 8px;
        border-left: 5px solid #a70000;
        padding: 15px 0px;

    }

    .alert-success {
        background-color: #64e48e;
        color: #008c3f;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        width: 100%;
        /* line-height: 0px; */
        align-items: center;
        display: flex;
        justify-content: center;
        border-radius: 8px;
        border-left: 5px solid #008c3f;
        padding: 15px 0px;

    }

    .error {
        color: red;
        font-family: "Roboto", sans-serif;
        font-weight: 400;
        font-size: 12px;
        margin-top: 5px;
    }

    .switch-text {
        font-family: 'Roboto';
        font-style: normal;
        display: flex;
        width: 100%;
        justify-content: center;
        font-weight: 400;
        font-size: 15px;
        line-height: 27px;
        color: #4D5959;
    }

    .switcher {
        color: #1874D7;
        text-decoration: none;
    }

    .form-inputs {
        font-family: 'Roboto';
        font-style: normal;
        outline: none;
        max-width: 100%;
        border: none;
        font-weight: 400;
        padding: 10px 15px;
        font-size: 18px;
        line-height: 30px;
        /* identical to box height */
        color: #838383;
        background: #EFF0F2;
        border-radius: 8px;
    }

    .form-button-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        /* align-items: center; */
        gap: 24px;
    }

    .form-button {
        width: 300px;
        height: 60px;
        cursor: pointer;
        display: flex;
        background-color: #0c0b0b;
        color: white;
        border-radius: 8px;
        border: 2px solid #0c0b0b;
        outline: none;
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 0px;
        /* identical to box height */


        color: #FFFFFF;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 0px;
        gap: 10px;
    }

    .form-button:hover {
        background-color: #ffffff;
        color: #0c0b0b;
    }

    .form-input-label {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 30px;
        /* identical to box height */
        color: #4D5959;
    }

    .button-form-contain {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
    }

    .form-right {
        display: flex;
        width: 100%;
        gap: 36px;
        align-items: start;
        flex-direction: column;
    }

    .form-input-contain {
        display: flex;
        width: 100%;
        flex-direction: column;
    }

    .page-main {
        display: flex;
        width: 100%;
        overflow: hidden;
        height: 100vh;
        flex-direction: row;
    }

    .title-signup {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 600;
        font-size: 48px;
        color: #1874D7;
        line-height: 72px;
    }

    .right-part {
        display: flex;
        height: 100%;
        align-items: center;
        width: 100%;
        justify-content: center;
    }

    .internal-right {
        display: flex;
        /* width: 100%; */
        flex-direction: column;
        gap: 36px;
        align-items: start;
    }

    .left-part {
        width: 100%;
        display: flex;
        padding: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1016%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(2%2c 13%2c 25%2c 1)'%3e%3c/rect%3e%3cuse xlink:href='%23SvgjsSymbol1023' x='0' y='0'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsSymbol1023' x='720' y='0'%3e%3c/use%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1016'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cpath d='M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z' id='SvgjsPath1019'%3e%3c/path%3e%3cpath d='M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z' id='SvgjsPath1020'%3e%3c/path%3e%3cpath d='M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z' id='SvgjsPath1017'%3e%3c/path%3e%3cpath d='M2 -2 L-2 2z' id='SvgjsPath1021'%3e%3c/path%3e%3cpath d='M6 -6 L-6 6z' id='SvgjsPath1018'%3e%3c/path%3e%3cpath d='M30 -30 L-30 30z' id='SvgjsPath1022'%3e%3c/path%3e%3c/defs%3e%3csymbol id='SvgjsSymbol1023'%3e%3cuse xlink:href='%23SvgjsPath1017' x='30' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='30' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='30' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='30' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='30' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='30' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='30' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='30' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='30' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='30' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='90' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='90' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='90' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='90' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='90' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='90' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='90' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='90' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='90' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='90' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='150' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='150' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='150' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='150' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='150' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='150' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='150' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='150' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='150' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='150' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='210' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='210' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='210' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='210' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='210' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='210' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='210' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='210' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='210' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='210' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='270' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='270' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='270' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='270' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='270' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='270' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='270' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='270' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='270' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='270' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='330' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='330' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='330' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='330' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='330' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='330' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='330' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='330' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='330' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='330' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='390' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='390' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='390' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='390' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='390' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='390' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='390' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='390' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='390' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='390' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='450' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='450' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='450' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='450' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='450' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='450' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='450' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='450' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='450' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='450' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='510' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='510' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='510' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='510' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='510' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='510' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='510' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='510' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='510' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='510' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='570' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='570' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='570' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='570' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='570' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='570' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='570' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='570' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='570' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='570' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='630' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='630' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='630' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='630' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='630' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='630' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='630' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1018' x='630' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='630' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='630' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1020' x='690' y='30' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='690' y='90' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1022' x='690' y='150' stroke='rgba(24%2c 116%2c 215%2c 1)' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='690' y='210' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='690' y='270' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='690' y='330' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1021' x='690' y='390' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='690' y='450' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1017' x='690' y='510' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1019' x='690' y='570' stroke='rgba(24%2c 116%2c 215%2c 1)'%3e%3c/use%3e%3c/symbol%3e%3c/svg%3e");
    }

    @media(max-width: 768px) {
        .left-part {
            display: none;
        }
    }
</style>

</html>