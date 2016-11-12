<!DOCTYPE html>
    <html>
        <head>
            <!--Import Google Icon Font-->
            <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
            <!--Import materialize.css-->
            <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.css"  media="screen,projection"/>
            <link rel="stylesheet" href="bower_components/qunit/qunit/qunit.css">
            <link rel="stylesheet" href="css/app.css"/>
            <link rel="shortcut icon" href="css/favicon.ico">

            <!--Let browser know website is optimized for mobile-->
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <meta name="csrf-token" content="{{csrf_token()}}" />
        </head>

        <body>
            <nav class="light-dark lighten-1" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">FIGLET</a>
                  <ul class="right hide-on-med-and-down">
                    <li><a id="about-figlet" href="javascript:" target="_blank">About FIGLET</a></li>
                    <li><a href="https://github.com/peter279k/figlet-generator" target="_blank">Fork me on Github</a></li>
                  </ul>

                  <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                  </ul>

                  <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>

            <div class="section no-pad-bot" id="index-banner">
                <div class="container">
                    <h1 class="header center black-text">FIGLET 文字產生器</h1>
                    <div class="row center">
                        <h5 class="header col s12 light orange-text">Help you generating the FIGLET texts through our service～</h5>
                    </div>
                    <div class="row center">
                        <a href="javascript:" id="start-button" class="btn-large waves-effect waves-light black">開始使用</a>
                    </div>
                    </div>
                </div>

                <div class="container">
                    <div id="about-figlet-txts" class="row"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12" name="figlet-forms">
                                    <i name="msg-label" class="material-icons prefix">mode_edit</i>
                                    <textarea id="message-area" class="materialize-textarea"></textarea>
                                    <label name="msg-label" for="message-area">請輸入文字：</label>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="input-field col s12" name="figlet-forms">
                                <select id="figlet-type" name="figlet-attr">
                                    <option value="" disabled selected>請選擇 "FIGLET" 類型</option>
                                    <option value="whale">鯨魚</option>
                                    <option value="cows">乳牛</option>
                                    <option value="dragon">龍</option>
                                    <option value="tux">企鵝</option>
                                    <option value="figlet">FIGLET</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" name="figlet-forms">
                                <select id="figlet-text-color" name="figlet-attr">
                                    <option value="" disabled selected>請選擇字體顏色</option>
                                    <option value="#f2f205">黃色</option>
                                    <option value="#9acd32">綠色</option>
                                    <option value="#000000">黑色</option>
                                    <option value="#2dbfff">藍色</option>
                                    <option value="#f6f3ee">白色</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" name="figlet-forms">
                                <select id="figlet-background-color" name="figlet-attr">
                                    <option value="" disabled selected>請選擇背景顏色</option>
                                    <option value="yellow">黃色</option>
                                    <option value="green">綠色</option>
                                    <option value="black">黑色</option>
                                    <option value="blue">藍色</option>
                                    <option value="white">白色</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" name="figlet-forms">
                                <select id="figlet-text-type" name="figlet-attr">
                                    <option value="" disabled selected>請選擇字體類型</option>
                                    <option value="bold">粗體</option>
                                    <option value="normal">正常</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div id="figlet-area" class="input-field col s12">
                                <pre id="result-figlet-txt"></pre>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <a href="javascript:" id="download-img-button" class="btn-large waves-effect waves-light orange">下載圖片</a>
                                <a href="" id="download-img-link"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="section">
                        <div class="row">
                            <div class="col s6 m4">
                                <h5 class="center">有趣的文字產生器</h5>
                                <?php echo $cowTexts[0]; ?>
                            </div>
                            <div class="col s6 m4">
                                <div class="icon-block">
                                    <h5 class="center">製作另類的祝賀詞</h5>
                                    <p class="light"><?php echo $cowTexts[1]; ?></p>
                                </div>
                            </div>
                            <div class="col s6 m4">
                                <div class="icon-block">
                                    <h5 class="center">產生完即可以下載成圖片</h5>
                                    <p class="light"><?php echo $cowTexts[2]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="page-footer black">
                <div class="container">
                    <div class="row">
                        <div class="col l6 s12">
                            <h5 class="white-text">FIGLET</h5>
                            <p class="grey-text text-lighten-4">The FIGLET text generator</p>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        Made by <a class="white-text text-lighten-3" href="https://github.com/peter279k" target="_blank">peter279k</a>
                    </div>
                </div>
            </footer>

            <div id="qunit"></div>
            <div id="qunit-fixture"></div>

            <!--Import jQuery before materialize.js-->
            <script src="bower_components/jquery/dist/jquery.min.js"></script>
            <script src="bower_components/materialize/dist/js/materialize.min.js"></script>
            <script src="bower_components/html2canvas/build/html2canvas.min.js"></script>
            <script src="bower_components/qunit/qunit/qunit.js"></script>
            <script src="bower_components/blanket/dist/qunit/blanket.min.js"></script>
            <script src="js/app.js" data-cover></script>
            <script src="js/appTest.js"></script>

    </body>
</html>
