<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title></title>
	<link href="estilo.css" rel="stylesheet"/>
</head>
<body>
    
      <canvas id="myCanvas"  width="588" height="200"></canvas>
    <script>
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var rectWidth = 110;
      var rectHeight = 110;
      var rectX = 189;
      var rectY = 90;
      var cornerRadius = 100;
      context.strokeStyle="#FF2A2A";
      context.beginPath();
      context.moveTo(rectX, rectY);
      context.lineTo(rectX + rectWidth - cornerRadius, rectY);
      context.arcTo(rectX + rectWidth, rectY, rectX + rectWidth, rectY + cornerRadius, cornerRadius);
      context.lineTo(rectX + rectWidth, rectY + rectHeight);
      context.lineWidth = 15;
      context.stroke();
    </script>

 
</body>
</html>