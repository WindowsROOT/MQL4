<!doctype html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="dist/vegas.min.css">
</head>
<body>
    
  <script type="text/javascript" src="dist/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="dist/vegas.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){


    $('body').vegas({
        slides: [
        { src: 'images/1.jpg' },
        { src: 'images/2.jpg' },
        { src: 'images/3.jpg' }
        ],
        animation: [ 'kenburnsUp', 'kenburnsDown', 'kenburnsLeft', 'kenburnsRight' ]
    });
});

  </script>
</body>
</html>