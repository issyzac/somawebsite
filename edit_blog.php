<?php
	require_once 'includes/Blog.php';
	$blog_id = $_GET['blog_id'];
  $blog = Blog::find($blog_id);
  $blog = htmlentities(json_encode($blog));

  // echo $blog;
  // return;

  // $blog = html_entity_decode($blog);
  // echo json_encode($blog);
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

    <meta property="og:url"           content="http://staging.somaapps.com/blog_detail.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Why telling of actual Africa stories is more likely to drive change" />
    <meta property="og:description"   content="Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, architecto non consequuntur neque odio fuga similique modi suscipit temporibus facilis eveniet vero itaque!" />
    <meta property="og:image"         content="img/blog/1.jpg" />

    <link rel="icon" href="logo.png">

    <link href="https://fonts.googleapis.com/css?family=Caudex:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="css/flex.css">
	<link rel="stylesheet" href="css/blog_detail.css">
	
	<link href=css/app.css rel=preload as=style>
	<link href=js/app.js rel=preload as=script>
	<link href=js/chunk-vendors.js rel=preload as=script>
  <link href=css/app.css rel=stylesheet>
  
  <style>
      .inline-editor {
          position: relative;
        }

        .inline-editor .ql-container.ql-snow {
          border: none !important;
        }

        .inline-editor .ql-editor {
          min-height: 0 !important;
          padding: 0 !important;
        }

        .inline-editor .ql-picker:not(.ql-background) {
          top: 0 !important;
        }

        .inline-editor .ql-snow.ql-toolbar {
          -webkit-box-shadow: 0 1px 4px 1px rgba(0, 0, 0, 0.2);
                  box-shadow: 0 1px 4px 1px rgba(0, 0, 0, 0.2);
          position: absolute;
          top: -36px;
          left: 0;
          background: #eee;
          border-radius: 3px;
          display: -webkit-inline-box !important;
          display: -ms-inline-flexbox !important;
          display: inline-flex !important;
          border: none !important;
          -webkit-box-align: center;
              -ms-flex-align: center;
                  align-items: center;
          -webkit-box-pack: justify;
              -ms-flex-pack: justify;
                  justify-content: space-between;
          z-index: 1;
          height: 40px;
          min-width: 340px;
          -webkit-transition: opacity 0.1s ease-out, -webkit-transform 0.1s ease-out;
          transition: opacity 0.1s ease-out, -webkit-transform 0.1s ease-out;
          transition: opacity 0.1s ease-out, transform 0.1s ease-out;
          transition: opacity 0.1s ease-out, transform 0.1s ease-out, -webkit-transform 0.1s ease-out;
        }

        .inline-editor:not(.focused) .ql-snow.ql-toolbar {
          opacity: 0;
          -webkit-transition: none;
          transition: none;
        }

        .inline-editor .ql-snow.ql-toolbar .ql-formats {
          margin: 0 !important;
          margin-right: 15px !important;
        }

        .inline-editor .ql-snow .ql-editor h2,
        .inline-editor .ql-snow .ql-editor h3 {
          font-family: "OpenSans", sans-serif;
          color: #444;
          font-size: 1.7em !important;
          margin-top: 0.3em !important;
          margin-bottom: 0.1em !important;
          max-width: 80%;
        }

        .inline-editor .ql-snow .ql-editor h3 {
          font-size: 1.5em !important;
        }

        .inline-editor .ql-snow.ql-toolbar .ql-formats:last-child {
          margin-right: 8px !important;
        }

        .inline-editor .ql-snow.ql-toolbar .ql-formats:first-child {
          margin-left: 4px !important;
        }

        .inline-editor .ql-snow.ql-toolbar button svg,
        .inline-editor .ql-snow.ql-toolbar button svg {
          width: 18px !important;
          height: 18px !important;
        }

        .inline-editor .ql-editor.ql-blank:before {
          font-style: normal !important;
          top: 3px;
          left: 0 !important;
          right: auto !important;
          font-size: 1.1em;
          color: #ccc;
        }



        /* INLINE EDITOR */
        .inline-editor .ql-snow .ql-editor h2,
        .inline-editor .ql-snow .ql-editor h3 {
            font-family: "OpenSans", sans-serif;
        }

        .inline-editor .ql-snow .ql-editor h3 {
            font-size: 1.5em !important;
        }

        .inline-editor .ql-snow .ql-editor p {
            font-family: OpenSans, sans-serif !important;
        }
        .inline-editor .ql-editor.ql-blank:before {
            font-family: OpenSans, sans-serif !important;
        }

        


        .inline-editor .ql-snow .ql-editor h2,
        .inline-editor .ql-snow .ql-editor h3 {
            font-family: OpenSans, sans-serif;
            color: #444;
            font-size: 1.7em !important;
            margin-top: 0.3em !important;
            margin-bottom: 0.1em !important;
            max-width: 80%;
        }

        .inline-editor .ql-snow .ql-editor h3 {
            font-size: 1.5em !important;
        }
        
        .inline-editor .ql-snow .ql-editor p {
            font-family: OpenSans, sans-serif !important;
            font-size: 1.1em !important;
            color: #000 !important;
        }

        .inline-editor .ql-editor.ql-blank:before {
            font-style: normal !important;
            top: 4px;
            left: 0 !important;
            right: auto !important;
            font-family: OpenSans, sans-serif !important;
            font-size: 1.1em;
            color: #ccc;
        }
      </style>
  </head>
  <body>
    <noscript>
      <strong>We're sorry but blog-creator doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>

    <div id="app">
	  <blog-creator
	  	  blog="<?php echo $blog; ?>"
        unsplash-client-id="17ef130962858e4304efe9512cf023387ee5d36f0585e4346f0f70b2f9729964"
        image-upload-url="upload_image.php"
        save-url="save_blog.php" />
    </div>

    <script>
      const UNSPLASH_CLIENT_ID = "17ef130962858e4304efe9512cf023387ee5d36f0585e4346f0f70b2f9729964";
      
      window.addEventListener("dragover",function(e){ e = e || event; e.preventDefault(); },false); 
      window.addEventListener("drop",function(e){e = e || event; e.preventDefault(); },false);
	</script>
	
	<script src=/js/chunk-vendors.js></script>
	<script src=/js/app.js></script>
    <!-- built files will be auto injected -->
  </body>
</html>