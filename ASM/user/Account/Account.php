<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Account.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php include_once '../View/header.php' ?>
    <div id="main">
        <div id="container-wrap">
            <div id="secondary">
                <div class="account-help">
                    <h3>CẦN GIÚP ĐỠ?</h3>
                    <p style="font-size:0.75rem;color: #252525;">Nếu bạn có bất kỳ câu hỏi hoặc cần sự hỗ trợ,hãy liên hệ chúng tôi:</p>
                    <div class="contact">
                        <p><svg width="17px" height="25px" viewBox="0 0 17 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-207.000000, -808.000000)" stroke="#041E3A">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <g id="Account-Help-Phone-Icon" transform="translate(0.000000, 104.000000)">
                                                <path d="M4.20608941,0 C2.25861693,0.905525 1.07116356,1.760999 0.64372932,2.566421 C-0.33243155,4.405819 -0.03934466,7.535566 0.4798959,9.41778 C1.41701042,12.814761 3.18354145,16.172005 5.31384889,18.826611 C7.4441563,21.481217 9.629828,22.791735 11.3000492,22.956348 C12.41353,23.06609 13.7346958,22.642022 15.2635467,21.684146 L11.9162251,15.043778 C11.0083872,15.784892 9.9880157,16.082546 8.8551105,15.936741 C7.1557528,15.718034 4.92673529,10.520935 4.92673529,8.968381 C4.92673529,7.933345 5.82841465,7.11791 7.6317734,6.522075 L4.20608941,0 Z" id="Phone"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg> <a href="tel:000-000-000">000-000-000</a></p>
                    </div>
                    <div style="font-size:.6875rem;color: #252525;" class="phone-detail">
                        <p>Chúng tôi sẵn sàng: <br>
                            Chủ nhật: 9:30am - 6:00pm ET <br>
                            Thứ hai-Thứ sáu: 8:00am - 8:00pm ET <br>
                            Thứ bảy: 11:00am - 7:30pm ET</p>
                    </div>
                    <div class="help-item chat">
                        <p>
                            <svg width="22px" height="19px" viewBox="0 0 22 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>chat icon</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-207.000000, -957.000000)" stroke="#041E3A" stroke-width="0.85">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <path d="M12.9652043,267.007906 C16.8503776,267.007906 20,263.872093 20,260.003953 C20,256.135752 16.8503776,253 12.9652043,253 L7.03479568,253.000795 C3.14956097,253.000795 0,256.136548 0,260.004748 C0,263.872888 3.14956097,267.008702 7.03479568,267.008702 C8.85074342,267.008524 9.98493346,267.008405 10.4373658,267.008344 C10.4373658,267.779021 10.4373658,269.341811 10.4373658,270 C11.7937121,269.48369 12.6363249,268.486325 12.9652043,267.007906 Z M4.66666667,258.44 L14.6666667,258.44 M4.66666667,261.84 L14.6666667,261.84" id="chat-icon"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="">TIN NHẮN ONLINE</a>
                        </p>
                    </div>
                    <div class="help-item email">
                        <p>
                            <svg width="20px" height="15px" viewBox="0 0 20 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Account-Help-Email-Icon</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-208.000000, -1074.000000)" fill="#041E3A" fill-rule="nonzero">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <g id="Account-Help-Email-Icon" transform="translate(0.000000, 369.000000)">
                                                <path d="M19.9772985,1.708268 C19.9772985,0.772231 19.2281498,0 18.3200908,0 L1.65720772,0 C0.74914869,0 0,0.772231 0,1.708268 L0,13.291732 C0,14.227769 0.74914869,15 1.65720772,15 L18.3427923,15 C19.2508513,15 20,14.227769 20,13.291732 L20,1.708268 L19.9772985,1.708268 Z M1.92273714,1 L18.056141,1 C18.582946,1 19,1.351648 19,1.879121 L19,2.164835 L10.0004142,7 L1.00082835,2.164835 L1.00082835,1.879121 C0.97887814,1.351648 1.39593212,1 1.92273714,1 Z M18.0560976,14 L1.94390244,14 C1.41707317,14 1,13.643002 1,13.107505 L1,3.218809 L9.8463415,8.038282 C9.8902439,8.060594 9.9560976,8.082906 10,8.082906 C10.0439024,8.082906 10.1097561,8.060594 10.1536585,8.038282 L19,3.218809 L19,13.107505 C19,13.643002 18.5829268,14 18.0560976,14 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="">EMAIL CHÚNG TÔI</a>
                        </p>
                    </div>
                    <div class="help-item phone-text">
                        <p>
                            <svg width="24px" height="30px" viewBox="0 0 24 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Text-Icon</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-207.000000, -1008.000000)">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <g id="Text-Icon" transform="translate(0.000000, 304.000000)">
                                                <path d="M16.5,17.4672445 L16.5,26.4 C16.5,27.0075132 16.0075132,27.5 15.4,27.5 L1.1,27.5 C0.492486775,27.5 0,27.0075132 0,26.4 L0,1.1 C0,0.492486775 0.492486775,0 1.1,0 L15.4,0 C16.0075132,0 16.5,0.492486775 16.5,1.1 L16.5,5.76497396 L16.5,5.76497396" id="Path" stroke="#041E3A" stroke-width="0.85"></path>
                                                <path d="M20.6008772,5.5 C20.9395941,5.5 21.2640829,5.61844981 21.4873904,5.85128894 C21.7106978,6.08413016 21.8166667,6.4113087 21.8166667,6.74902837 L21.8166667,6.74902837 L21.8166667,16.3249169 C21.8166667,16.6626283 21.704366,16.9833573 21.4810581,17.2161569 C21.2577503,17.4489565 20.9395333,17.5739515 20.6008772,17.5739515 L20.6008772,17.5739515 L12.4512884,17.5739515 L9.12686403,20.7875891 C9.01298813,20.8983073 8.83369748,20.9313563 8.68945115,20.8682552 C8.54520482,20.8051334 8.44417798,20.6493994 8.44298245,20.4883378 L8.44298245,20.4883378 L8.44298245,17.5739515 L8.44298245,17.5739515 L7.62612391,17.5739515 C7.29255585,17.5660847 6.97547548,17.4464383 6.75227522,17.2161569 C6.52907495,16.9858756 6.41666667,16.6626908 6.41666667,16.3249169 L6.41666667,16.3249169 L6.41666667,6.74902837 C6.41666667,6.4113087 6.52896884,6.08410103 6.75227522,5.85128894 C6.9755816,5.61847894 7.29379738,5.5 7.63245614,5.5 L7.63245614,5.5 Z M20.6008772,6.33268626 L7.63245614,6.33268626 C7.46600382,6.33268626 7.38418788,6.37872384 7.32850877,6.43677181 C7.27282967,6.49481979 7.22719298,6.58481787 7.22719298,6.74902837 L7.22719298,6.74902837 L7.22719298,16.3249169 C7.22719298,16.4890796 7.26634302,16.573034 7.32217653,16.6306616 C7.37700905,16.6872278 7.46704474,16.7356357 7.63245614,16.7412549 L7.63245614,16.7412549 L8.84824562,16.7412549 C9.06043512,16.7412757 9.2534875,16.9396111 9.25350877,17.1575928 L9.25350877,17.1575928 L9.25350877,19.519054 L12.014364,16.8518482 C12.0892447,16.7807555 12.1910197,16.7412549 12.2929825,16.7412549 L12.2929825,16.7412549 L20.6008772,16.7412549 C20.7673324,16.7412549 20.8491472,16.6952194 20.9048246,16.6371756 C20.9605018,16.5791318 21.0061404,16.4891421 21.0061404,16.3249169 L21.0061404,16.3249169 L21.0061404,6.74902837 C21.0061404,6.58481787 20.9605023,6.49482603 20.9048246,6.43677181 C20.8491469,6.3787176 20.7672716,6.33268626 20.6008772,6.33268626 L20.6008772,6.33268626 Z" id="Combined-Shape" fill="#041E3A"></path>
                                                <line x1="0.916666667" y1="22.4583333" x2="15.5833333" y2="22.4583333" id="Line" stroke="#041E3A" stroke-width="0.55" stroke-linecap="square"></line>
                                                <circle id="Oval" fill="#041E3A" cx="11" cy="11.4583333" r="1"></circle>
                                                <circle id="Oval-Copy" fill="#041E3A" cx="14.2083333" cy="11.4583333" r="1"></circle>
                                                <circle id="Oval-Copy-3" fill="#041E3A" cx="8.25" cy="24.2916667" r="1"></circle>
                                                <circle id="Oval-Copy-2" fill="#041E3A" cx="17.4166667" cy="11.4583333" r="1"></circle>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="">NHẮN TIN CHO CHÚNG TÔI</a>
                        </p>
                    </div>
                    <p id="sms">
                        <a href="sms:1-111-111-111">1-111-111-111</a>
                    </p>
                </div>
            </div>
            <div id="primary">
                <div style="position: relative;" class="col1 account-login">
                    <div style="position: absolute" class="effect-account">
                        <div class="loader-account">
                        </div>
                    </div>
                    <div class="tab">
                        <button onclick="toggle_Tab(this)" id="login-tab">Đăng Nhập</button>
                        <button onclick="toggle_Tab(this)" id="createlogin-tab">Đăng Ký</button>
                    </div>
                    <div id="mobile-mode">
                        <div class="social-login">
                            <button id="Facebook">
                                <svg style="height: 2rem;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 206.2 201.4" style="enable-background:new 0 0 206.2 201.4;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #1877F2;
                                        }

                                        #Facebook .st1 {
                                            fill: #FFFFFF;
                                        }
                                    </style>
                                    <g>
                                        <g>
                                            <path class="st0" d="M204,100.9C204,45.5,159,0.5,103.6,0.5S3.2,45.5,3.2,100.9c0,50.1,36.7,91.7,84.8,99.2v-70.2H62.3v-29H88
                            			V78.8c0-25.1,14.9-39.1,37.8-39.1c11,0,22.3,2.1,22.3,2.1v24.5h-12.6c-12.5,0-16.4,7.9-16.4,15.7v18.8H147l-4.4,29h-23.5V200
                            			C167.3,192.6,204,151,204,100.9z" />
                                            <path class="st1" d="M142.7,130l4.4-29h-27.9V82.2c0-8,4-15.7,16.4-15.7h12.6V41.9c0,0-11.4-2.1-22.3-2.1c-23,0-37.8,14-37.8,39.1
                            			V101H62.4v29h25.6v70.2c5.1,0.8,10.3,1.2,15.6,1.2s10.5-0.4,15.6-1.2V130H142.7z" />
                                        </g>
                                    </g>
                                </svg>
                                <span>FACEBOOK</span>
                            </button>
                            <button id="Google">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 206.2 201.4" style="enable-background:new 0 0 206.2 201.4;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #4285F4;
                                        }

                                        .st1 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #34A853;
                                        }

                                        .st2 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #FBBC05;
                                        }

                                        .st3 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #EA4335;
                                        }

                                        .st4 {
                                            fill: none;
                                        }
                                    </style>
                                    <title>FindUs-FB-RGB-Blk1024</title>
                                    <g id="Google-Button">
                                        <g id="_x39_-PATCH" transform="translate(-608.000000, -160.000000)">
                                        </g>
                                        <g id="btn_google_light_normal" transform="translate(-1.000000, -1.000000)">
                                            <g id="logo_googleg_48dp" transform="translate(15.000000, 15.000000)">
                                                <path id="Shape" class="st0" d="M185.4,89c0-7.1-0.6-14-1.8-20.5H89.1v38.8h54c-2.3,12.5-9.4,23.2-20,30.3v25.2h32.4
                            				C174.5,145.3,185.4,119.5,185.4,89L185.4,89z" />
                                                <path id="Shape_1_" class="st1" d="M89.1,187.1c27.1,0,49.8-9,66.4-24.3l-32.4-25.2c-9,6-20.5,9.6-34,9.6
                            				c-26.1,0-48.3-17.7-56.2-41.4H-0.6v26C15.9,164.6,49.9,187.1,89.1,187.1L89.1,187.1z" />
                                                <path id="Shape_2_" class="st2" d="M32.9,105.8c-2-6-3.1-12.5-3.1-19.1s1.1-13,3.1-19.1v-26H-0.6c-6.8,13.5-10.7,28.9-10.7,45.1
                            				s3.9,31.5,10.7,45.1L32.9,105.8L32.9,105.8z" />
                                                <path id="Shape_3_" class="st3" d="M89.1,26.3c14.7,0,28,5.1,38.4,15l28.8-28.8c-17.4-16.2-40.1-26.1-67.1-26.1
                            				c-39.2,0-73.2,22.5-89.7,55.3l33.5,26C40.8,43.9,63,26.3,89.1,26.3L89.1,26.3z" />
                                                <path id="Shape_4_" class="st4" d="M-11.3-13.7h200.7v200.7H-11.3V-13.7z" />
                                            </g>
                                            <g id="handles_square">
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>GOOGLE</span>
                            </button>
                        </div>
                        <div class="social-login-mobile">
                            <button id="Facebook-mobile">
                                <svg style="height: 1.2rem;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 206.2 201.4" style="enable-background:new 0 0 206.2 201.4;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #1877F2;
                                        }

                                        #Facebook-mobile .st1 {
                                            fill: #FFFFFF;
                                        }
                                    </style>
                                    <g>
                                        <g>
                                            <path class="st0" d="M204,100.9C204,45.5,159,0.5,103.6,0.5S3.2,45.5,3.2,100.9c0,50.1,36.7,91.7,84.8,99.2v-70.2H62.3v-29H88
                                                    			V78.8c0-25.1,14.9-39.1,37.8-39.1c11,0,22.3,2.1,22.3,2.1v24.5h-12.6c-12.5,0-16.4,7.9-16.4,15.7v18.8H147l-4.4,29h-23.5V200
                                                    			C167.3,192.6,204,151,204,100.9z" />
                                            <path class="st1" d="M142.7,130l4.4-29h-27.9V82.2c0-8,4-15.7,16.4-15.7h12.6V41.9c0,0-11.4-2.1-22.3-2.1c-23,0-37.8,14-37.8,39.1
                                                    			V101H62.4v29h25.6v70.2c5.1,0.8,10.3,1.2,15.6,1.2s10.5-0.4,15.6-1.2V130H142.7z" />
                                        </g>
                                    </g>
                                </svg>
                                <span>TIẾP TỤC VỚI FACEBOOK</span>
                            </button>
                            <button id="Google-mobile">
                                <svg style="height: 1.2rem;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 206.2 201.4" style="enable-background:new 0 0 206.2 201.4;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #4285F4;
                                        }

                                        .st1 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #34A853;
                                        }

                                        .st2 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #FBBC05;
                                        }

                                        .st3 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                            fill: #EA4335;
                                        }

                                        .st4 {
                                            fill: none;
                                        }
                                    </style>
                                    <title>FindUs-FB-RGB-Blk1024</title>
                                    <g id="Google-Button">
                                        <g id="_x39_-PATCH" transform="translate(-608.000000, -160.000000)">
                                        </g>
                                        <g id="btn_google_light_normal" transform="translate(-1.000000, -1.000000)">
                                            <g id="logo_googleg_48dp" transform="translate(15.000000, 15.000000)">
                                                <path id="Shape" class="st0" d="M185.4,89c0-7.1-0.6-14-1.8-20.5H89.1v38.8h54c-2.3,12.5-9.4,23.2-20,30.3v25.2h32.4
                                                    				C174.5,145.3,185.4,119.5,185.4,89L185.4,89z" />
                                                <path id="Shape_1_" class="st1" d="M89.1,187.1c27.1,0,49.8-9,66.4-24.3l-32.4-25.2c-9,6-20.5,9.6-34,9.6
                                                    				c-26.1,0-48.3-17.7-56.2-41.4H-0.6v26C15.9,164.6,49.9,187.1,89.1,187.1L89.1,187.1z" />
                                                <path id="Shape_2_" class="st2" d="M32.9,105.8c-2-6-3.1-12.5-3.1-19.1s1.1-13,3.1-19.1v-26H-0.6c-6.8,13.5-10.7,28.9-10.7,45.1
                                                    				s3.9,31.5,10.7,45.1L32.9,105.8L32.9,105.8z" />
                                                <path id="Shape_3_" class="st3" d="M89.1,26.3c14.7,0,28,5.1,38.4,15l28.8-28.8c-17.4-16.2-40.1-26.1-67.1-26.1
                                                    				c-39.2,0-73.2,22.5-89.7,55.3l33.5,26C40.8,43.9,63,26.3,89.1,26.3L89.1,26.3z" />
                                                <path id="Shape_4_" class="st4" d="M-11.3-13.7h200.7v200.7H-11.3V-13.7z" />
                                            </g>
                                            <g id="handles_square">
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>TIẾP TỤC VỚI GOOGLE</span>
                            </button>
                        </div>
                        <div id="line"></div>


                        <!-- FORM đăng nhập -->

                        <div id="login-panel">
                            <form action="" method="post" id="login_account">
                                <div class="login-control">
                                    <input class="input_element" type="email" name="email" id="login_email">
                                    <span>* ĐỊA CHỈ EMAIL</span>
                                </div>
                                <div class="login-control">
                                    <input class="input_element" type="password" name="password" id="login_password">
                                    <span>* MẬU KHẨU</span>
                                </div>
                                <div class="forgot">
                                    <a href="./forgotpassword.php">Quên Mật Khẩu?</a>
                                    <span>* Bắt Buộc</span>
                                </div>
                                <div class="remember">
                                    <input id="rem" type="checkbox">
                                    <label for="rem">Nhớ Mậu Khẩu</label>
                                    <span>Chi tiết</span>
                                </div>
                                <div class="btn-sign-in">
                                    <button>ĐĂNG NHẬP</button>
                                </div>
                            </form>
                        </div>

                        <!-- FORM đăng ký -->

                        <div id="createlogin-panel">
                            <form action="" method="post" id="create_account">
                                <div class="create-login-control">
                                    <input class="input_element" type="email" name="email" id="email">
                                    <span>* ĐỊA CHỈ EMAIL</span>
                                </div>
                                <div class="create-login-control">
                                    <input class="input_element" type="password" name="password" id="password">
                                    <span>* MẬT KHẨU MỚI</span>
                                </div>
                                <div class="create-login-control">
                                    <input class="input_element" type="password" name="password_confirm" id="password_confirm">
                                    <span>* NHẬP LẠI MẬU KHẨU</span>
                                </div>
                                <div class="create-login-control">
                                    <input class="input_element" type="text" name="username" id="username">
                                    <span>* TÊN ĐĂNG NHẬP</span>
                                </div>
                                <div class="create-login-control">
                                    <input class="input_element" type="text" name="name" id="name">
                                    <span>* TÊN</span>
                                </div>
                                <div class="remember">
                                    <input id="rem-create" type="checkbox">
                                    <label for="rem-create">Nhớ Tài Khoản</label>
                                    <span>Chi tiết</span>
                                </div>
                                <div class="subscribe">
                                    <input id="subscribe" type="checkbox">
                                    <label for="subscribe">
                                        Đăng ký để nhận email cập nhật.Ralph Lauren không chia sẽ hoặc bán thông cá nhân của khách hàng.
                                    </label>
                                </div>
                                <div class="policy">
                                    <a href="">Xem Chính Sách Bảo Mật</a>
                                </div>
                                <div class="btn-create-account">
                                    <button>
                                        TẠO TÀI KHOẢN
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col2-container">
                    <div class="col2 order-track">
                        <h3>KIỂM TRA TRẠNG THÁI ĐẶT HÀNG</h3>
                        <p>
                            Xem đơn hàng của bạn ngay cả khi bạn không có tài khoản.Nhập mã đơn hàng của bạn và điền địa chỉ mã ZIP.
                        </p>
                        <form action="">
                            <div class="order-track-input">
                                <input autocomplete="off" type="text">
                                <span>* MÃ ĐƠN HÀNG</span>
                            </div>
                            <div class="order-track-input">
                                <input type="email">
                                <span>* EMAIL ĐẶT HÀNG</span>
                            </div>
                            <div class="order-track-input">
                                <input type="text">
                                <span>* MÃ ZIP</span>
                            </div>
                            <div style="text-align: center;">
                                <button>kiểm tra trạng thái</button>
                            </div>
                        </form>
                    </div>
                    <div class="col2 benefits">
                        <h2>NHỮNG LỢI ÍCH KHI TẠO TÀI KHOẢN</h2>
                        <h3>
                            Những tin tức mới và Chương trình đặc biệt !
                        </h3>
                        <p>
                            Đăng ký để nhận email cập nhật về giảm giá đặc biệt,những sản phẩm mới nhất,những quà tặng và nhiều chương trình khác.
                        </p>
                        <h3>
                            Lịch Sử Đặt Hàng
                        </h3>
                        <p>
                            Nhận những thông tin quan trọng về đơn hàng của bạn.Bạn có thể theo dõi khi nào đơn hàng của mình được giao.
                        </p>
                        <h3>
                            Thanh Toán Nhanh Chóng
                        </h3>
                        <p>
                            Tiết kiệm chi phí và thông tin giao hàng để dễ dàng hơn trong việc mua sắm của bạn.
                        </p>
                        <div class="security">
                            <a href="">Đọc Thêm Về Chính Sách Bảo Mật</a>
                        </div>
                    </div>
                </div>
                <div class="account-help mobile">
                    <h3>CẦN GIÚP ĐỠ?</h3>
                    <p style="font-size:0.75rem;color: #252525;">Nếu bạn có bất kỳ câu hỏi hoặc cần sự hỗ trợ,hãy liên hệ chúng tôi:</p>
                    <div class="contact">
                        <p><svg width="17px" height="25px" viewBox="0 0 17 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-207.000000, -808.000000)" stroke="#041E3A">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <g id="Account-Help-Phone-Icon" transform="translate(0.000000, 104.000000)">
                                                <path d="M4.20608941,0 C2.25861693,0.905525 1.07116356,1.760999 0.64372932,2.566421 C-0.33243155,4.405819 -0.03934466,7.535566 0.4798959,9.41778 C1.41701042,12.814761 3.18354145,16.172005 5.31384889,18.826611 C7.4441563,21.481217 9.629828,22.791735 11.3000492,22.956348 C12.41353,23.06609 13.7346958,22.642022 15.2635467,21.684146 L11.9162251,15.043778 C11.0083872,15.784892 9.9880157,16.082546 8.8551105,15.936741 C7.1557528,15.718034 4.92673529,10.520935 4.92673529,8.968381 C4.92673529,7.933345 5.82841465,7.11791 7.6317734,6.522075 L4.20608941,0 Z" id="Phone"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg> <a href="tel:000-000-000">000-000-000</a></p>
                    </div>
                    <div style="font-size:.6875rem;color: #252525;" class="phone-detail">
                        <p>Chúng tôi sẵn sàng: <br>
                            Chủ nhật: 9:30am - 6:00pm ET <br>
                            Thứ hai-Thứ sáu: 8:00am - 8:00pm ET <br>
                            Thứ bảy: 11:00am - 7:30pm ET</p>
                    </div>
                    <div class="help-item chat">
                        <p>
                            <svg width="22px" height="19px" viewBox="0 0 22 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>chat icon</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-207.000000, -957.000000)" stroke="#041E3A" stroke-width="0.85">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <path d="M12.9652043,267.007906 C16.8503776,267.007906 20,263.872093 20,260.003953 C20,256.135752 16.8503776,253 12.9652043,253 L7.03479568,253.000795 C3.14956097,253.000795 0,256.136548 0,260.004748 C0,263.872888 3.14956097,267.008702 7.03479568,267.008702 C8.85074342,267.008524 9.98493346,267.008405 10.4373658,267.008344 C10.4373658,267.779021 10.4373658,269.341811 10.4373658,270 C11.7937121,269.48369 12.6363249,268.486325 12.9652043,267.007906 Z M4.66666667,258.44 L14.6666667,258.44 M4.66666667,261.84 L14.6666667,261.84" id="chat-icon"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="">TIN NHẮN ONLINE</a>
                        </p>
                    </div>
                    <div class="help-item email">
                        <p>
                            <svg width="20px" height="15px" viewBox="0 0 20 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Account-Help-Email-Icon</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-208.000000, -1074.000000)" fill="#041E3A" fill-rule="nonzero">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <g id="Account-Help-Email-Icon" transform="translate(0.000000, 369.000000)">
                                                <path d="M19.9772985,1.708268 C19.9772985,0.772231 19.2281498,0 18.3200908,0 L1.65720772,0 C0.74914869,0 0,0.772231 0,1.708268 L0,13.291732 C0,14.227769 0.74914869,15 1.65720772,15 L18.3427923,15 C19.2508513,15 20,14.227769 20,13.291732 L20,1.708268 L19.9772985,1.708268 Z M1.92273714,1 L18.056141,1 C18.582946,1 19,1.351648 19,1.879121 L19,2.164835 L10.0004142,7 L1.00082835,2.164835 L1.00082835,1.879121 C0.97887814,1.351648 1.39593212,1 1.92273714,1 Z M18.0560976,14 L1.94390244,14 C1.41707317,14 1,13.643002 1,13.107505 L1,3.218809 L9.8463415,8.038282 C9.8902439,8.060594 9.9560976,8.082906 10,8.082906 C10.0439024,8.082906 10.1097561,8.060594 10.1536585,8.038282 L19,3.218809 L19,13.107505 C19,13.643002 18.5829268,14 18.0560976,14 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="">EMAIL CHÚNG TÔI</a>
                        </p>
                    </div>
                    <div class="help-item phone-text">
                        <p>
                            <svg width="24px" height="30px" viewBox="0 0 24 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Text-Icon</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="ContactUs" transform="translate(-207.000000, -1008.000000)">
                                        <g id="Left-Rail" transform="translate(208.000000, 705.000000)">
                                            <g id="Text-Icon" transform="translate(0.000000, 304.000000)">
                                                <path d="M16.5,17.4672445 L16.5,26.4 C16.5,27.0075132 16.0075132,27.5 15.4,27.5 L1.1,27.5 C0.492486775,27.5 0,27.0075132 0,26.4 L0,1.1 C0,0.492486775 0.492486775,0 1.1,0 L15.4,0 C16.0075132,0 16.5,0.492486775 16.5,1.1 L16.5,5.76497396 L16.5,5.76497396" id="Path" stroke="#041E3A" stroke-width="0.85"></path>
                                                <path d="M20.6008772,5.5 C20.9395941,5.5 21.2640829,5.61844981 21.4873904,5.85128894 C21.7106978,6.08413016 21.8166667,6.4113087 21.8166667,6.74902837 L21.8166667,6.74902837 L21.8166667,16.3249169 C21.8166667,16.6626283 21.704366,16.9833573 21.4810581,17.2161569 C21.2577503,17.4489565 20.9395333,17.5739515 20.6008772,17.5739515 L20.6008772,17.5739515 L12.4512884,17.5739515 L9.12686403,20.7875891 C9.01298813,20.8983073 8.83369748,20.9313563 8.68945115,20.8682552 C8.54520482,20.8051334 8.44417798,20.6493994 8.44298245,20.4883378 L8.44298245,20.4883378 L8.44298245,17.5739515 L8.44298245,17.5739515 L7.62612391,17.5739515 C7.29255585,17.5660847 6.97547548,17.4464383 6.75227522,17.2161569 C6.52907495,16.9858756 6.41666667,16.6626908 6.41666667,16.3249169 L6.41666667,16.3249169 L6.41666667,6.74902837 C6.41666667,6.4113087 6.52896884,6.08410103 6.75227522,5.85128894 C6.9755816,5.61847894 7.29379738,5.5 7.63245614,5.5 L7.63245614,5.5 Z M20.6008772,6.33268626 L7.63245614,6.33268626 C7.46600382,6.33268626 7.38418788,6.37872384 7.32850877,6.43677181 C7.27282967,6.49481979 7.22719298,6.58481787 7.22719298,6.74902837 L7.22719298,6.74902837 L7.22719298,16.3249169 C7.22719298,16.4890796 7.26634302,16.573034 7.32217653,16.6306616 C7.37700905,16.6872278 7.46704474,16.7356357 7.63245614,16.7412549 L7.63245614,16.7412549 L8.84824562,16.7412549 C9.06043512,16.7412757 9.2534875,16.9396111 9.25350877,17.1575928 L9.25350877,17.1575928 L9.25350877,19.519054 L12.014364,16.8518482 C12.0892447,16.7807555 12.1910197,16.7412549 12.2929825,16.7412549 L12.2929825,16.7412549 L20.6008772,16.7412549 C20.7673324,16.7412549 20.8491472,16.6952194 20.9048246,16.6371756 C20.9605018,16.5791318 21.0061404,16.4891421 21.0061404,16.3249169 L21.0061404,16.3249169 L21.0061404,6.74902837 C21.0061404,6.58481787 20.9605023,6.49482603 20.9048246,6.43677181 C20.8491469,6.3787176 20.7672716,6.33268626 20.6008772,6.33268626 L20.6008772,6.33268626 Z" id="Combined-Shape" fill="#041E3A"></path>
                                                <line x1="0.916666667" y1="22.4583333" x2="15.5833333" y2="22.4583333" id="Line" stroke="#041E3A" stroke-width="0.55" stroke-linecap="square"></line>
                                                <circle id="Oval" fill="#041E3A" cx="11" cy="11.4583333" r="1"></circle>
                                                <circle id="Oval-Copy" fill="#041E3A" cx="14.2083333" cy="11.4583333" r="1"></circle>
                                                <circle id="Oval-Copy-3" fill="#041E3A" cx="8.25" cy="24.2916667" r="1"></circle>
                                                <circle id="Oval-Copy-2" fill="#041E3A" cx="17.4166667" cy="11.4583333" r="1"></circle>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="">NHẮN TIN CHO CHÚNG TÔI</a>
                        </p>
                    </div>
                    <p id="sms">
                        <a href="sms:1-111-111-111">1-111-111-111</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php include_once '../View/footer.php' ?>
    <script src="./Account.js"></script>
    <script>
        $("#category").off("mouseleave");
        $("#category").on("mouseleave", function() {
            $("#category").css("height", "0px");
        });
        $("#category-toggle").off("mouseleave");
        $("#category-toggle").on("mouseleave", function() {
            timeout_category = setTimeout(() => {
                $("#category").css("height", "0px");
            }, 1000)
        })
        $("#search-toggle").off("click");
        $("#search-toggle").on("click", function() {
            if ($("#search-container").css("height") == "0px") {
                $("#search-container").css("height", "65vh");
            } else {
                $("#search-container").css("height", "0px");
            }
        })
        $("#search-form").off("submit");
        $("#search-form").on("submit", function(event) {
            event.preventDefault();
            if ($("#search").val() == "") {
                $("#search-container").css("height", "0px");
            } else {
                window.location.href = "/ASM/user/View/searchlist.php?keyword=" + $("#search").val();
            }

        })
    </script>
</body>

</html>