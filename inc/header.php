<head>
<title>ZIVIMA(District Development Portal)</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <style>
        .process-step .btn:focus {
            outline: none
        }
        
        .process {
            display: table;
            width: 100%;
            position: relative
        }
        
        .process-row {
            display: table-row
        }
        
        .process-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important
        }
        
        .process-row:before {
            top: 40px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
        }
        
        .process-step {
            display: table-cell;
            text-align: center;
            position: relative
        }
        
        .process-step p {
            margin-top: 4px
        }
        .blink {
                animation: blinker 1s linear infinite;
                }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
        
        .btn-circle {
            width: 80px;
            height: 80px;
            text-align: center;
            font-size: 12px;
            border: 1px solid #000;
            border-radius: 50%
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        .header {
            background-color: black;
            color: white;
            height: 25px;
            font-family: 'Lato', sans-serif;
        }
        
        .img-pos {
            position: relative;
        }
        .main {
            position: relative;
            height: 500px;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("innov1.jpg");
        }
        
        .content-over-img {
            position: absolute;
            top: 30px;
            right: 40px;
            width: 500px;
            height: 400px;
            background-color: #86b9db;
        }
        
        #menu1 {
            width: 500px;
            height: 360px;
            overflow: scroll;
        }
        
        p.format {
            color: #000;
            line-height: 24px;
            margin: 0 0 20px;
        }
        
        .nav-link {
            color: black;
        }
        
        .stickynav {
            border-bottom: 1px solid #777;
            position: sticky;
        }
        
        .image {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("innov1.jpg");
            height: 500px;
            width: 100%;
        }
        nav-item:hover{
            display: block;
            border: 1px solid orangered;
        }
        .ihead {
            color: #FFFFFF;
            font-size: 25px;
            font-family: Marker Felt, fantasy;
            text-align: center;
            word-spacing: 5px;
            letter-spacing: 8px;
            padding-top: 170px;
        }
        .social-media 
            {
                padding-left: 0;
                margin-bottom: 0;
                list-style: none;
                display: flex;
                flex-wrap: wrap;
                
            }
            .soc-item
            {
                margin: 5px;
                opacity:0.4;
                
            }
            .social-media a {
                color:white;
            };
    </style>
</head>    
</head>