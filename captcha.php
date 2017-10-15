<?php
session_start();
?>

    <title>demo.php</title>
    <body style="background-color:#ddd; ">

    <?php
    create_image();
    display();

    function display()
    {
    ?>

        <div style="text-align:center;">
            <h3>Введите текст, который видите на картинке</h3>
            <b>Чтобы проверить, что вы не робот</b>

            <div style="display:block;margin-bottom:20px;margin-top:20px;">
                <img src="image.png">
            </div>
        </div>

    <?php
    }

    function create_image()
    {
        $image = imagecreatetruecolor(200, 60) or die("Не удалось инициализировать новый поток изображения, GD");;
        

        $background_color = imagecolorallocate($image, 236,233,226);
		imagefilledrectangle($image,0,0,200,60,$background_color);

		
		for($i=0;$i<10;$i++) 
		{
			$pixel_color = imagecolorallocate($image, 207,210,200 + rand() % 55);
    		imagefilledellipse($image,rand()%200,rand()%60,rand()%60,rand()%60,$pixel_color);
		}

		$line_color = imagecolorallocate($image, 90,125,163);
		for($i = 0;$i < 3; $i++) 
		{
			imagesetthickness ($image,5);
			if(rand()%2)
			{
				$degrees = 180;
				$h = 30;
				$w = 100;
			} 
    		else 
    		{
    			$degrees = 0;
    			$h = 0;
    			$w = 0;
    		}

			$start = 0 + $degrees;
			$end = 180 + $degrees;
			imagearc($image, $w + rand()%100, $h + rand()%30, 400, rand()%50, $start, $end, $line_color);
		}

		$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$len = strlen($letters);
		$letter = $letters[rand(0, $len - 1)];
 
		$text_color = imagecolorallocate($image, 99,95,146);
		$word = "";
		for ($i = 0; $i < 6; $i++)
		{
			$letter = $letters[rand(0, $len - 1)];
			imagestring($image, 5, 5 + ($i * 30), 25, $letter, $text_color);
			$word .= $letter;
		}

		imagepng($image, "./image.png");
		imagedestroy($im);
    }

    ?>
    </body>
<?php
?>