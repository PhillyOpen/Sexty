<!DOCTYPE html>

<html lang="$ContentLocale">
  <head>
		<% base_tag %>
		<title><% if MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
		$MetaTags(false)
		<link rel="shortcut icon" href="/favicon.ico" />
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="http://sexting.emelle.me/themes/blackcandy/css/bootstrap.css?m=1317335053">
	<link rel="stylesheet" type="text/css" href="http://sexting.emelle.me/themes/blackcandy/css/jquery-ui.css">
    <!-- Le styles -->
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }
      
	.page-header {
		text-align:center;
	}
      .page-header h1 {
		margin-bottom: 8px;
		text-align: center;
		font-size: 60px;
		}

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }
      
      ul { list-style: none; padding: 1em; position: relative;
	    border: 1px solid #9DB029; width: 40em; margin: 1em 0; 
height: 600px; }

	li { border: 1px solid #ddd; width: 14em;
	    margin: 0.25em; padding: 0.5em; background-color: #eee; overflow: hidden; }

	#u10 li { width: auto; }

    </style>

		
		
		<!--[if IE 6]>
			<style type="text/css">
			 @import url(themes/blackcandy/css/ie6.css);
			</style> 
		<![endif]-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
		<% require javascript(mysite/javascript/smooth-add.js) %>
		<% require javascript(mysite/javascript/sexting.js) %>
	</head>
<body>

    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">Sexting App</a>
          
        </div>
      </div>
    </div>

    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>(215) 642-0898 <br><small>Text 'girl' or 'boy' to this 
number to get started.</small></h1>
	<p><span class="label warning">Warning!</span> not suitable for 
chilren under 13.</p>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Text Stream</h2>
            
            <ul id="u10"></ul>
            
          </div>
          <div class="span4">
            <h3>Instructions</h3>
            <ol>
            <li>Start by texting 'boy' or 'girl' to the number above.</li>
            <li>Wait for the response to begin sexting!</li>
            </ol>
          </div>
        </div>
      </div>

      <footer>
        <p>&copy; Phatapps 2011</p>
      </footer>
$Form
    </div> <!-- /container -->

  </body>
</html>
