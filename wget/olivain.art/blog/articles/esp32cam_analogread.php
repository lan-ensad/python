<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta property="og:url" content="http://olivain.art" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Olivain Porry" />
  <meta property="og:description" content="Portfolio, science, art recherches ettechniques" />
  <meta property="og:image" content="imgs/social.jpg" />
  <link rel="apple-touch-icon" sizes="57x57" href="imgs/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="imgs/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="imgs/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="imgs/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="imgs/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="imgs/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="imgs/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="imgs/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="imgs/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="imgs/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="imgs/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="imgs/favicon-16x16.png">
  <link rel="manifest" href="imgs/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="imgs/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <title>ESP32-CAM et AnalogRead</title>
  <link rel="stylesheet" type="text/css" href="../../fonts.css">
  <link rel="stylesheet" type="text/css" href="../../style3.css">
</head>
<body>

  <div class="wrapper">
    
<div class="space"></div>

<div class="menu_masonry" style="justify-content: center;">

  <a href="
  http://olivain.art/olivain.php  ">

    <div class="col menuItem">
      <div class="centerTextVertically">
        <span class="menuText
                ">Olivain</span>
      </div>
    </div>
  </a>

  <a href="
  http://olivain.art/arts.php  ">
    <div class="col menuItem">
      <div class="centerTextVertically">
        <span class="menuText
                ">Art(s)</span>
      </div>
    </div>
  </a>

  <a href="
  http://olivain.art/pdfs.php  ">
    <div class="col menuItem">
      <div class="centerTextVertically">
        <span class="menuText
                ">Textes</span>
      </div>
    </div>
  </a>

  <a href="
  http://olivain.art/blog.php  ">
    <div class="col menuItem">
      <div class="centerTextVertically">
        <span class="menuText
                ">Notes</span>
      </div>
    </div>
  </a>

</div>

  <div class="space"></div>
    <div class="masonryBlog">
      <div class="col colText">
        <h1>ESP32-CAM et AnalogRead</h1>
      </div>
      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>Lorsque j'ai reçu mon premier esp32-Cam AI Thinker, j'étais très excité à l'idée de pouvoir enfin fabriquer un système capable d'arroser une plante
          tout en la photographiant. La perspective d'obtenir une chronophotographie de ma plante grandissant de jour en jour m'emplissait de joie !</p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="http://olivain.art/blog/imgs/ai-thinker-esp32-cam-diagram.jpg">
      </div>

      <div class="col col--4x colText textContainer">

        <span class="regularText">
          <p>J'ai tout d'abord regardé le repérage des broches de la carte, et je me suis rendu compte que peu de broches étaient disponibles. Il est clair que l'esp32-Cam nécessite de ruser.
          Dans mon cas, il était nécessaire de pouvoir utiliser une broche pour écrire afin d'activer et désactiver un relay-switch, et une autre pour lire les données qu'un capteur
          d'humidité du sol enverrait.</p>
        </span>
      </div>

      <div class="col col--4x">
        <img src="../imgs/ai-thinker-esp32-cam-pinout.jpg">
      </div>

      <div class="col col--4x colText textContainer">

        <span class="regularText">
          <p>Un capteur d'humidité renvoit des valeurs analogiques.
          Au vu du repérage de broches, toutes les broches sont capables de recevoir des valeurs analogiques, mais elles sont toutes ADC2 !
          Effectivement, sur une esp32-Cam, aucune broche ADC1 n'est directement accessible. Il semblerait bien que la pin 33, dédiée ADC1, de la puce ESP-WROOM-32 soit inutilisée et qu'il soit <a target="_blank" href="https://github.com/espressif/esp32-camera/issues/87">possible</a> d'y souder un
          cable pour l'utiliser, mais une telle opération me parait houleuse.
          <br><br>
          J'ai donc fait un premier test de mon capteur branché sur la broche GPIO 14 l'esp32-Cam avec un programme très simple, qui ne faisait rien d'autre que lire en boucle la valeur reçue et l'afficher dans le moniteur série.<br>
          <br>Et ça fonctionnait très bien ! Le capteur renvoyait une valeur entre 0 et 4096 correspondant à la conductivité de la terre dans laquelle il était planté.
          <br>
          Très satisfait de cette première victoire, j'ai agrémenté le programme d'une connection WiFi au réseau local. Lorsque j'ai testé ce code, plus rien ne fonctionnait ! Le programait n'affichait plus comme valeur reçue du capteur que 4096 !
          <br><br>
          Les broches ADC2 sont en effet utilisées par les fonctionnalités WiFi et Bluetooth de la carte, elles sont a-priori inutilisables dés le premier appel à WiFi.begin().
          <br>
          Heuresement, il existe une solution que j'ai fini par trouver en farfouillant dans les <a target="_blank" href="https://github.com/espressif/arduino-esp32/issues/102#issuecomment-593650746">discussions sur le github de Espressif</a>.
          Cette solution s'est montrée effective sur l'esp32-Cam de AI Thinker, le modèle précis que je possède.<br>
          <br>
          Il s'agit de modifier les valeurs des registres de contrôle de l'ADC2.</p>
        </span>
      </div>

      <div class="col col--4x colText regularText ">
        <pre>
<font color="#434f54">&#47;&#47; procédure pour utiliser les broches ADC2 sur ESP32-Cam lorsque le WiFi ou le Bluetooth sont activés</font>
<font color="#434f54">&#47;&#47; (Généralement, seules les broches ADC1 sont utilisables avec analogRead() lorsque le WiFi ou le Bluetooth sont actifs)</font>

<font color="#434f54">&#47;&#47; D&#39;abord on sauvegarde la valeur du registre ADC2 avant de lancer WifiBegin() ou BluetoothBegin()</font>
<font color="#434f54">&#47;&#47; Ensuite, après avoir initié la connectin WiFi ou Bluetooth, on ré-écrit dans le registre la valeur sauvegardée </font>
<font color="#434f54">&#47;&#47; Il apparait alors que les valeurs lues par AnalogRead sont inversées ! </font>
<font color="#434f54">&#47;&#47; Il nous faut alors écrire la valeur enregistrée dans le registre ADC2 </font>
<font color="#434f54">&#47;&#47; mais aussi écrire dans une autre valeur du registre pour recevoir les données correctement</font>
<font color="#434f54">&#47;&#47; On effectue ces opérations avant chaque utilisation de AnalogRead</font>

<font color="#5e6d03">#include</font> <font color="#434f54">&lt;</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#000000">h</font><font color="#434f54">&gt;</font>
<font color="#5e6d03">#include</font> <font color="#005c5f">&#34;soc&#47;sens_reg.h&#34;</font> <font color="#434f54">&#47;&#47; On a besoin de cete variable pour manipuler le registre de controle ADC2</font>
<font color="#00979c">uint64_t</font> <font color="#000000">reg_b</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; cette variable va stocker la valeur du registre ADC2</font>

<font color="#00979c">const</font> <font color="#00979c">char</font><font color="#434f54">*</font> <font color="#000000">ssid</font> <font color="#434f54">=</font> <font color="#005c5f">&#34;Le_reseau_wifi_local&#34;</font><font color="#000000">;</font>
<font color="#00979c">const</font> <font color="#00979c">char</font><font color="#434f54">*</font> <font color="#000000">password</font> <font color="#434f54">=</font> <font color="#005c5f">&#34;le_mdp_wifi_local&#34;</font><font color="#000000">;</font>

<font color="#00979c">int</font> <font color="#000000">alt_analogRead</font><font color="#000000">(</font><font color="#00979c">int</font> <font color="#000000">pin</font><font color="#000000">)</font> <font color="#000000">{</font>
&nbsp;<font color="#434f54">&#47;&#47; On restaure la valeur du registre ADC2</font>
&nbsp;<font color="#000000">WRITE_PERI_REG</font><font color="#000000">(</font><font color="#000000">SENS_SAR_READ_CTRL2_REG</font><font color="#434f54">,</font> <font color="#000000">reg_b</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;<font color="#434f54">&#47;&#47;On modifie cette autre valeur du registre pour éviter les valeurs inversées</font>
&nbsp;<font color="#000000">SET_PERI_REG_MASK</font><font color="#000000">(</font><font color="#000000">SENS_SAR_READ_CTRL2_REG</font><font color="#434f54">,</font> <font color="#000000">SENS_SAR2_DATA_INV</font><font color="#000000">)</font><font color="#000000">;</font>

<font color="#5e6d03">return</font> <font color="#d35400">analogRead</font><font color="#000000">(</font><font color="#000000">pin</font><font color="#000000">)</font><font color="#000000">;</font>
<font color="#000000">}</font>


<font color="#00979c">void</font> <font color="#5e6d03">setup</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">begin</font><font color="#000000">(</font><font color="#000000">115200</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;<font color="#d35400">pinMode</font><font color="#000000">(</font><font color="#000000">14</font><font color="#434f54">,</font><font color="#00979c">INPUT</font><font color="#000000">)</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; GPIO14 pour recevoir les données du capteur</font>

&nbsp;<font color="#434f54">&#47;&#47; on enregistre la valeur du registre de controle ADC2 AVANT(!) de lancer le Wifi</font>
&nbsp;<font color="#000000">reg_b</font> <font color="#434f54">=</font> <font color="#000000">READ_PERI_REG</font><font color="#000000">(</font><font color="#000000">SENS_SAR_READ_CTRL2_REG</font><font color="#000000">)</font><font color="#000000">;</font>

&nbsp;<b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">begin</font><font color="#000000">(</font><font color="#000000">ssid</font><font color="#434f54">,</font> <font color="#000000">password</font><font color="#000000">)</font><font color="#000000">;</font>

&nbsp;<font color="#5e6d03">while</font> <font color="#000000">(</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">status</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#434f54">!=</font> <font color="#000000">WL_CONNECTED</font><font color="#000000">)</font> <font color="#000000">{</font>
&nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">500</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">print</font><font color="#000000">(</font><font color="#005c5f">&#34;.&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;<font color="#000000">}</font>
&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;Connecté : &#34;</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">localIP</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">)</font><font color="#000000">;</font>
&nbsp;
&nbsp;
&nbsp;<font color="#000000">}</font>

<font color="#00979c">void</font> <font color="#5e6d03">loop</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#000000">alt_analogRead</font><font color="#000000">(</font><font color="#000000">14</font><font color="#000000">)</font><font color="#000000">)</font><font color="#000000">;</font><font color="#434f54">&#47;&#47; On affiche les valeurs reçues !</font>
<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">100</font><font color="#000000">)</font><font color="#000000">;</font>
<font color="#000000">}</font>

<font color="#434f54">&#47;&#47; Et voila comment on utilise de l&#39;ADC2 et le wifi sur l&#39;esp32-Cam de AI Thinker !!</font>
        </pre>
      </div>

      <div class="blogPagesNav">
        <div style="float: right;"><a href="vx_exhib_a.php">vx.exhib.a
 >></a></div><div style="float: left;"><a href="plantbot3.php"><< Robot-plante
</a></div>      </div>

    </div>

          </div>
        </body>
        </html>
