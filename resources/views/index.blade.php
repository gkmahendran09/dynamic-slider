<!doctype html>
<html lang="en">
<head>
<title>Rage - Full Width Carousel</title>
<link href="/assets/css/style.css" type="text/css" rel="stylesheet"/>
<script src="/assets/js/jquery.js" type="text/javascript"></script>
<script src="/assets/js/script.js" type="text/javascript"></script>
</head>

<body>
<div class="header">
	<a href="javascript:;" title="Rage" class="logo"><img src="/assets/images/rage.png" alt="rage"></a>
</div>
<div class="container">
<ul class="slider">  
  @foreach ( $images as $img )
    <li>
      <div class="img" style="background:url('/{{$img->file_path}}') no-repeat center center;background-size: cover;">
        <div class="info">
          {{$img->client_name}}<br>
          {{$img->description}}<br>
          {{$img->text1}}<br>
          {{$img->text2}}<br>

        </div>
      </div>
    </li>
  @endforeach
</ul>
<!-- <a href="" class="right">Slide to Right</a>
<a href="" class="left">Slide to Left</a>-->
</div>

</body>
</html>
