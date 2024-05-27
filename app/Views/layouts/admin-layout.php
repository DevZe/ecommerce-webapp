<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-Commerce WebApp</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="assets/css/store.css" rel="stylesheet">
    <style>
    * {box-sizing: border-box;}

    .container {
    position: relative;
    padding: 0;
    margin: 0;
    }

    .image {
    display: block;
    width: 100%;
    height: auto;
    }

    .overlay {
    position: absolute; 
    bottom: 0; 
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5); /* Black see-through */
    color: #f1f1f1; 
    width: 100%;
    transition: .5s ease;
    opacity:0;
    color: white;
    font-size: 20px;
    padding: 20px;
    text-align: center;
    }

    .container:hover .overlay {
    opacity: 1;
    }

    .header {
    margin:auto;
    text-align: center;
    }

    /**Left Nav and GridMenu Style */
    /* Create two columns/boxes that floats next to each other */
    .nav {
    float: left;
    width: auto;
    background-color: #f1f1f1;
    border-radius: 15px 0px 0px 15px;
    padding: 20px;
    }
    .left-menu {
    margin:auto ;
    }

    /* Style the list inside the menu */
    .nav .left-menu {
    list-style-type: none;
    padding: 0;
    }

    .row {
    float: left;
    padding: 20px;
    width: 80%;
    background-color: #f1f1f1;
    height: auto; /* only for demonstration, should be removed */
    border-radius: 0px 15px 15px 15px;
    }

    /* Clear floats after the columns */
    section::after {
    content: "";
    display: table;
    clear: both;
    
    }

    /* Style the footer */
    footer {
    background-color: #777;
    padding: 10px;
    text-align: center;
    color: white;
    }

    /**End Left GirdMenu Style */
    @media (max-width: 600px) {
    .nav, article {
        width: 100%;
        height: auto;
    }
    }
    </style>
</head>
<body>
    <?= $this->renderSection('store') ?>
   
</body>
</html>