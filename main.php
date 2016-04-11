<!DOCTYPE html>
<html>
<head>
    <title>Feeds</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src=time.js></script>
	<script type="text/javascript" src=hide.js></script>
</head>




<body bgcolor=#f4fcff onload="start()">

	 <div class="blue darken-3 head">
	 <h4 align="center" style="color:white">My Feeds</h4>
	      <div class="row">
		    <form class="col s4 m4 l4" method="post">
		        <div class="input-field col s7 m7 l7">
		          <i class="material-icons prefix">input</i>
		          <input id="icon_prefix" type="text" name="url" value="https://www.reddit.com/.rss">
		          <label for="icon_prefix">rss url</label>
		          </div>
		    </form>
		    <div class="col s4 m8 l8">
		    <h6 id="time" align=right></h6>
		    <h6 id="te" align=right></h6>
		    </div>
  			</div>
		 </div>

	<br><br><br><br><br><br><br><br><br>	
    <div class="container">
	<?php
    $u="https://www.reddit.com/.rss";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $u=$_POST["url"];
	}
	$flag=1;
	$xml=simplexml_load_file("$u") or $flag=0;
    if($flag==0){
    	echo "<h4 align=center>Sorry, Unable to load feeds</h4>";
    }
    else{
	$id=1;
	foreach($xml->children() as $feed)
	 { 
	 	if($feed->getName()!="entry")
	 		continue;
	 	 $l=$feed->link['href'];
	 	 
	 	 echo "<div class=\"row\" id=\"$id\">
		        <div class=\"col s12 m12 l12\">
		          <div class=\"card hoverable blue lighten-4\">
		            
		              <div class=\"card-title blue darken-2\"><a style=\"color: white\"href=$l><h5>$feed->title</h5></a>
		              <h6 align=\"right\">$feed->updated</h6>
		              </div>
		              <p>$feed->content</p>
		            
		            <p align=right>
		 	       <a href=\"javascript: void(0)\"  onclick=\"he($id)\" ><img src=\"icon.jpg\" alt=\"delete\" height=2% width=2%></a>
		 	       </p>
		          </div>
		        </div>
		      </div>";
	 
	 	 echo "<br><br>";
	 	 $id=$id+1;
	 }
	 if($id==1)
	 	{echo "<h4 align=center>Sorry, Unable to load feeds</h4>";}
	}
	?>
	</div>
</body> 