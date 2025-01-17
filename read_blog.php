<?php
    require_once 'includes/Blog.php';
    
    $blog_id = $_GET['blog_id'];
    $blog = Blog::find($blog_id);
    $title = preg_replace("/\\\\'/", "'", $blog->title);
    $cover = json_decode($blog->creator_json)->cover;
    $cover_class = 'cover-image-' . $cover->options->width;
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

    <meta property="og:url"           content="http://staging.somaapps.com/blog_detail.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Why telling of actual Africa stories is more likely to drive change" />
    <meta property="og:description"   content="Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, architecto non consequuntur neque odio fuga similique modi suscipit temporibus facilis eveniet vero itaque!" />
    <meta property="og:image"         content="img/blog/1.jpg" />

    <link rel="icon" href="logo.png">

    <link href="https://fonts.googleapis.com/css?family=Caudex:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="css/flex.css">
	  <link rel="stylesheet" href="css/main.css">
	  <link rel="stylesheet" href="css/blog_detail.css">
  </head>
  <body>
    <header class="layout vertical center">
        <a href="/blog" class="for-mob">
            <svg fill="#888" width="25px" height="25px" x="0px" y="0px" viewBox="0 0 31.494 31.494" style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve"><path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554 c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587 c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/></svg>
        </a>
        
        <a id="logo" href="/" class="layout center">
            <img src="img/logo.png" alt="Somaapps Technologies" width="70px;" height="70px">
        </a>

        <nav class="layout center">
            <a href="/" class="for-lg layout center-center">Home</a>
            <a href="/somaapp" class="for-lg layout center-center">SomaApp</a>
            <a href="/somafiti" class="for-lg layout center-center">SomaFiti</a>
            <a href="#" class="for-lg layout center-center active">Blog</a>
            <a href="/contacts" class="layout center-center">Contact Us</a>
        </nav>
    </header>
    <main style="min-height: calc(100vh - 320px);">
        <div id="content">
          <div id="insightBody">
            <?php if($blog->cover_url != null) {
                echo '
                    <div id="insightImage" style="margin-top: 0" class="blogpost-section-wrapper '. $cover_class .'">
                        <img src="'. $blog->cover_url .' ?>" alt="">
                    </div>';
            }?>
    
            <div class="blogpost-section-wrapper">
                <div id="insightTitle">
                    <h1 style="overflow: visible; margin-bottom: 0.4em; overflow: visible;">
                      <?php echo $title; ?>
                    </h1>
    
                    <!-- <h5><span class="taggy-item">BUSINESS GROWTH</span><span class="taggy-item">TECHNOLOGY</span></h5> -->
                </div>
                <span id="insightDate">
                    <!-- Published {{date | formatDate}} -->
                    By <?php echo $blog->author; ?>
    
                    <?php if($blog->published_at != null) {
                      $unix_date = strtotime( $blog->published_at );
        
                      echo '<span style="color: #777; display: inline-block; position: relative; top: -2px"> &nbsp;|&nbsp; </span> ' . date("M d, Y", $unix_date);
                    }?>
                </span>
            </div>
    
            <div class="blog-content">
              <?php echo $blog->body; ?>
    
              <div class="blogpost-section-wrapper">
                <div id="shareOptions" class="layout center start-justified">
                    <small>SHARE POST:</small>
    
                    <a target="_blank" class="share-option layout center" title="twitter"
                        href="https://twitter.com/intent/tweet?original_referer=http://staging.somaapps.com/blog_detail.html&amp;ref_src=&amp;text=Why telling of actual Africa stories is more likely to drive change&amp;url=somaapps.com&amp;via=somaapps" target="_blank" onclick="javascript:window.open('https://twitter.com/intent/tweet?original_referer=http://somaapps.com&amp;ref_src=&amp;text=Why telling of actual Africa stories is more likely to drive change&amp;url=somaapps.com&amp;via=somaapps'); return false;">
                        <svg width="20" height="20" fill="#333" viewBox="0 0 24 24"><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                    </a>
    
                    <a target="_blank" href="https://www.facebook.com/sharer.php?s=100&p[url]=http://staging.somaapps.com/blog_detail.html" class="share-option layout center">
                        <svg width="20" height="20" fill="#333" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0"/></svg>
                    </a>
    
                    <!-- <a href="#" class="share-option layout center">
                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>
                    </a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="relatedArticles">
          <div class="section-wrapper">
              <div class="layout start justified">
                  <a href="blog_detail.html" class="blog-item">
                      <h2>PREVIOUS POST</h2>
                      <div>
                          <img src="img/blog/2.jpg" alt="">
                          <div class="text">
                              <h3>
                                  Pioneering creation of technology awaraness among africa's 
                                  sons and daughters
                              </h3>
                          </div>
                      </div>
                  </a>
                  
                  <a href="blog_detail.html" class="blog-item">
                      <h2>NEXT POST</h2>
                      <div>
                          <img src="img/blog/3.jpg" alt="">
                          <div class="text">
                              <h3>
                                  Retrospective look at whether we're ready to dive into smart cities or if it's just a facade
                              </h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
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

        <script>
            var entered = [];
            var cheatcode = "edit";

            document.addEventListener('keyup', (event) => {
                entered.push(event.key);
                entered.splice(-cheatcode.length, entered.length - cheatcode.length);
                var current_word = entered.join("").toLocaleLowerCase();
                console.log(current_word);

                if(current_word === cheatcode.toLocaleLowerCase()){
                    var new_location = window.location.href.replace('read_blog', 'edit_blog');
                    console.log(new_location);
                    window.location.href = new_location;
                }
            }, false);
        </script>
    </footer>
  </body>
</html>