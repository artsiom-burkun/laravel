<?php
$res = $modx->getObject('modResource', $id);
$url = $modx->getOption('site_url');

// Получаем базовые значения
$pagetitle = $res->pagetitle;
$h1 = $res->getTVValue('H1') ? $res->getTVValue('H1') : "";

// Получаем значения ТВ
$tvBig = $res->getTVValue('image');
if ($tvBig{0} == "/") {
    $tvBig = substr($tvBig, 1);
}
$tvSmall = json_decode($res->getTVValue('galleryPhotos'));

// Формируем массив изображений
$images = $url . $tvBig;
$i = 0;

foreach($tvSmall as $value)
{
    $littleImages[$i][image] = $url . $value->image;
    if ($littleImages[$i][image]{0} == "/") {
        $littleImages[$i][image] = substr($littleImages[$i][image], 1);
    }
    $littleImages[$i][title] = $value->title;

    // echo $littleImages[$i][image];

    // самые маленькие изображения по ширине
    if (getimagesize($littleImages[$i][image]) [0] < 501)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo2.png|C|50|50|50'
        ));

    }

    // самые маленькие изображения по высоте
    if (getimagesize($littleImages[$i][image]) [0] < 1001
        and getimagesize($littleImages[$i][image]) [0] > 500
        and getimagesize($littleImages[$i][image]) [1] < 501)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo23.png|C|50|50|50'
        ));

    }

    // средние изображения
    if (getimagesize($littleImages[$i][image]) [0] < 1001
        and getimagesize($littleImages[$i][image]) [0] > 500
        and getimagesize($littleImages[$i][image]) [1] > 500
        and getimagesize($littleImages[$i][image]) [1] < 1001)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo3.png|C|50|50|50'
        ));

    }

    // маленькие изображения по высоте
    if (getimagesize($littleImages[$i][image]) [0] > 1000
        and getimagesize($littleImages[$i][image]) [1] < 501)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo23.png|C|50|50|50'
        ));

    }

    // средние изображения
    if (getimagesize($littleImages[$i][image]) [0] > 1000
        and getimagesize($littleImages[$i][image]) [1] > 500
        and getimagesize($littleImages[$i][image]) [1] < 1001)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo34.png|C|50|50|50'
        ));

    }

    // средние изображения
    if (getimagesize($littleImages[$i][image]) [0] > 500
        and getimagesize($littleImages[$i][image]) [0] < 1001
        and getimagesize($littleImages[$i][image]) [1] > 1000)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo34.png|C|50|50|50'
        ));

    }

    // большие изображения
    if (getimagesize($littleImages[$i][image]) [0] > 1000
        and getimagesize($littleImages[$i][image]) [1] > 1000)
    {
        $bigImage = $modx->runSnippet('phpthumbof', array(
            'input' => $littleImages[$i][image],
            'options' => 'w=1500&fltr[]=wmi|/images/logo4.png|C|50|50|50'
        ));

    }

    $smallImage = $modx->runSnippet('phpthumbof', array(
        'input' => $littleImages[$i][image],
        'options' => 'w=60'
    ));
    $prev[$i] = '<a class="example-image-link" href="' . $bigImage . '"
    data-lightbox="example-set" data-title="' . $littleImages[$i][title] . '" >
<img class="example-image" src="' . $smallImage . '" 
alt="' . $littleImages[$i][title] . '"  style="margin: 5px; padding-top: 5px;"/></a>';

    $i++;
}


$finaltitle = isset($h1) ? $h1 : $pagetitle;

//echo $images;
    // Формируем большую картинку
	// самые маленькие изображения по ширине
	if (getimagesize($images) [0] < 501)
    {
        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo2.png|C|50|50|50'
        ));
    }

	// самые маленькие изображения по высоте
	if (getimagesize($images) [0] < 1001
        and getimagesize($images) [0] > 500
        and getimagesize($images) [1] < 501)
    {
        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo2.png|C|50|50|50'
        ));

    }

	// средние изображения
	if (getimagesize($images) [0] < 1001
        and getimagesize($images) [0] > 500
        and getimagesize($images) [1] > 500
        and getimagesize($images) [1] < 1001)
    {
        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo3.png|C|50|50|50'
        ));

    }

	// маленькие изображения по высоте
	if (getimagesize($images) [0] > 1000
        and getimagesize($images) [1] < 501)
    {
        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo2.png|C|50|50|50'
        ));
    }

	// средние изображения
	if (getimagesize($images) [0] > 1000
        and getimagesize($images) [1] > 500
        and getimagesize($images) [1] < 1001)
    {
        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo34.png|C|50|50|50'
        ));
    }

	// средние изображения
	if (getimagesize($images) [0] > 500
        and getimagesize($images) [0] < 1001
        and getimagesize($images) [1] > 1000)
    {
        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo34.png|C|50|50|50'
        ));
    }

	// большие изображения
	if (getimagesize($images) [0] > 1000
        and getimagesize($images) [1] > 1000)
    {

        $bigFullImage = $modx->runSnippet('phpthumbof', array(
            'input' => $images,
            'options' => 'w=1500&fltr[]=wmi|/images/logo4.png|C|50|50|50'
        ));
    }

$smallFullImage = $modx->runSnippet('phpthumbof', array(
    'input' => $images,
    'options' => 'w=335&hp=400&fltr[]=wmi|/images/logo2.png|C|50|50|80'
));
$html = '<a class="example-image-link" href="' . $bigFullImage . '" 
data-lightbox="example-set" data-title="' . $finaltitle . '">
<img class="example-image" src="' . $smallFullImage . '" 
alt="' . $finaltitle . '" title="' . $finaltitle . '" width="100%" /></a>';

foreach ($prev as $prewiev) {
    $html .= $prewiev;
}

return $html;