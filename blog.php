<?
    require_once 'includes/Blog.php';
    $blogs = Blog::all();
    // echo json_encode($blogs);
    // return;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Somaapps Technologies</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#231f21">
    <meta name="apple-mobile-web-app-status-bar-style" content="#231f21">
    <meta name="theme-color" content="#231f21">
    <meta name="apple-mobile-web-app-status-bar-style" content="#231f21">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="iPF Softwares">


    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/flex.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="icon" href="logo.png">
</head>

<body class="show-na">
    <header class="layout vertical center">
        <a id="logo" href="/" class="layout vertica center">
            <img src="img/logo.png" alt="Somaapps Technologies" width="70px;" height="70px">
        </a>

        <nav class="layout center">
            <a href="/" class="for-lg layout center-center">Home</a>
            <a href="/somaapp" class="layout center-center">SomaApp</a>
            <a href="/somafiti" class="layout center-center">SomaFiti</a>
            <a href="#" class="layout center-center active">Blog</a>
            <a href="/contacts" class="layout center-center">Contact Us</a>
        </nav>
    </header>

    <main>
        <div id="blogHeaderWrapper" class="section-wrapper">
            <div id="blogHeader">
                <?php
                    $blog = $blogs[0];
                    $title = preg_replace("/\\\\'/", "'", $blog->title);
                    $body = strip_tags($blog->body);
                    $short_body = substr($body, 0, 200);
                    if(strlen($body) > 200){
                        $short_body .= '...';
                    }

                    echo '<img src="'. $blog->cover_url .'" alt="">';
                    
                    echo '
                        <div id="text" class="layout vertical center-justified">
                            <h1>'. $title .'</h1>
                            <p class="for-lg">
                                ' . $short_body . '
                            </p>
                            <a href="read_blog.php?blog_id='. $blog->id .'">Read More</a>
                        </div>
                    ';
                ?>
                
            </div>
        </div>

        <div class="section-wrapper">
            <?php
                for ($i=1; $i < count($blogs); $i++) { 
                    $blog = $blogs[$i];
                    $title = preg_replace("/\\\\'/", "'", $blog->title);
                    $unix_date = $blog->published_at != null ? strtotime( $blog->published_at ) : "";
                    $date = $blog->published_at != null ? date("M d, Y", $unix_date) : "";
                    $body = strip_tags($blog->body);
                    $short_body = substr($body, 0, 200);
                    if(strlen($body) > 200){
                        $short_body .= '...';
                    }else if(strlen($body) < 1){
                        $short_body = "This blog has no content";
                    }
    
                    echo '<a href="read_blog.php?blog_id='. $blog->id .'" class="blog-item">
                        <img src="' . $blog->cover_url . '" alt="">
                        <div class="text">
                            <h3>'. $title .'</h3>
                            <p class="for-lg">
                                ' . $short_body . '
                            </p>
                        </div>
    
                        <small class="date">'. $date .'</small>
                    </a>';
                }
            ?>
        </div>
    </main>

    <footer>
        <div id="ceoQuote" class="section-wrapper layout vertical center-center">
            <q>
				In the modern technology-driven world, the power lies not simply in the
                acquisition of education, but in harnessing it to create solutions and opprotunities.
			</q>
            <small class="text-accent">
				Isaya Yunge, CEO Somaapps Technologies
			</small>
        </div>

        <div class="section-wrapper" style="max-width: 1300px !important;">
            <div id="copyright" class="section-wrapper layout start justified">
                <div class="layout center">
                    <img src="img/logo-wide.png" height="50px" alt="Somaapps wide logo"> &nbsp;&emsp;
                    <hr><span class="for-lg">&emsp;&nbsp;</span>
                    <span>Copyright &copy; 2018 Somaapps Technologies</span>
                </div>

                <div id="footerLocation" class="layout">
                    <svg fill="#555" width="60" height="60" viewBox="0 0 24 24">
						<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
						<path d="M0 0h24v24H0z" fill="none"/>
					</svg> <span class="for-lg">&emsp;</span>&nbsp;

                    <div>
                        Somaapps HQ Dar Es Salaam, Tanzania <br>
                        <a target="_blank" href="https://www.google.com/maps/place/SomaApp+HQ/@-6.7807388,39.218371,15z/data=!4m5!3m4!1s0x0:0xb0dada27a1439432!8m2!3d-6.7807388!4d39.218371">
							View on Google Maps
						</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        var entered = [];
        var cheatcode = "create";

        document.addEventListener('keyup', (event) => {
            console.log(event.key);
            entered.push(event.key);
            entered.splice(-cheatcode.length, entered.length - cheatcode.length);

            if(entered.join("").toLocaleLowerCase() === cheatcode.toLocaleLowerCase()){
                var new_location = window.location.href.replace("blog.php", "create_blog.html");
                console.log(new_location);
                window.location.href = new_location;
            }
        }, false);
    </script>
</body>

</html>