<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Robot-Plante : Une collaboration plante-machine !</title>
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
  </div>
<pre>

    <font color="#5e6d03">#include</font> <font color="#434f54">&lt;</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#000000">h</font><font color="#434f54">&gt;</font> <font color="#434f54">&#47;&#47; Pour se connecter au réseau wifi</font>
    <font color="#5e6d03">#include</font> <font color="#005c5f">&#34;esp_camera.h&#34;</font> <font color="#434f54">&#47;&#47; Pour capturer une image</font>
    <font color="#5e6d03">#include</font> <font color="#434f54">&lt;</font><font color="#000000">esp_http_client</font><font color="#434f54">.</font><font color="#000000">h</font><font color="#434f54">&gt;</font> <font color="#434f54">&#47;&#47; Pour envoyer la photo au serveur</font>
    <font color="#5e6d03">#include</font> <font color="#005c5f">&#34;soc&#47;sens_reg.h&#34;</font> <font color="#434f54">&#47;&#47; Pour la ruse ADC2</font>

    <font color="#434f54">&#47;&#47; Les valeurs du cycle d&#39;arrosage </font>
    <font color="#5e6d03">#define</font> <font color="#000000">NB_CYCLE_WATERING</font> <font color="#000000">1</font>
    <font color="#5e6d03">#define</font> <font color="#000000">TIME_BTWN_WATERING</font> <font color="#000000">5000</font>
    <font color="#5e6d03">#define</font> <font color="#000000">WATERING_TIME</font> <font color="#000000">3000</font>

    <font color="#434f54">&#47;&#47; Le temps d&#39;attente avant de lire de nouveau</font>
    <font color="#434f54">&#47;&#47; le capteur d&#39;humidité (1h en millisecondes)</font>
    <font color="#5e6d03">#define</font> <font color="#000000">SLEEPING_TIME</font> <font color="#000000">(</font><font color="#000000">3600</font><font color="#434f54">*</font><font color="#000000">1000</font><font color="#000000">)</font>

    <font color="#434f54">&#47;&#47; Les valeurs seuils du capteur d&#39;humidité</font>
    <font color="#5e6d03">#define</font> <font color="#000000">MAX_MOIST_VAL</font> <font color="#000000">2000</font>
    <font color="#5e6d03">#define</font> <font color="#000000">MIN_MOIST_VAL</font> <font color="#000000">3000</font>

    <font color="#434f54">&#47;&#47; Les pins de l&#39;ESP-WROOM-32 pour la caméra OV2640 du modèle AI THINKER</font>
    <font color="#5e6d03">#define</font> <font color="#000000">PWDN_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">32</font>
    <font color="#5e6d03">#define</font> <font color="#000000">RESET_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;<font color="#434f54">-</font><font color="#000000">1</font>
    <font color="#5e6d03">#define</font> <font color="#000000">XCLK_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">0</font>
    <font color="#5e6d03">#define</font> <font color="#000000">SIOD_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">26</font>
    <font color="#5e6d03">#define</font> <font color="#000000">SIOC_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">27</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y9_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">35</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y8_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">34</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y7_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">39</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y6_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">36</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y5_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">21</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y4_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">19</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y3_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">18</font>
    <font color="#5e6d03">#define</font> <font color="#000000">Y2_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">5</font>
    <font color="#5e6d03">#define</font> <font color="#000000">VSYNC_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;<font color="#000000">25</font>
    <font color="#5e6d03">#define</font> <font color="#000000">HREF_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">23</font>
    <font color="#5e6d03">#define</font> <font color="#000000">PCLK_GPIO_NUM</font> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">22</font>


    <font color="#000000">camera_fb_t</font> <font color="#434f54">*</font> <font color="#000000">fb</font> <font color="#434f54">=</font> <font color="#00979c">NULL</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; Camera buffer</font>
    <font color="#00979c">uint64_t</font> <font color="#000000">reg_b</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; valeur du registre pour analogread()</font>

    <font color="#434f54">&#47;&#47; Les broches gpio</font>
    <font color="#00979c">int</font> <font color="#000000">moist_pin</font> <font color="#434f54">=</font> <font color="#000000">14</font><font color="#000000">;</font>
    <font color="#00979c">int</font> <font color="#000000">relay_pin</font> <font color="#434f54">=</font> <font color="#000000">2</font><font color="#000000">;</font>
    <font color="#00979c">int</font> <font color="#000000">led_pin</font> <font color="#434f54">=</font> <font color="#000000">4</font><font color="#000000">;</font>

    <font color="#434f54">&#47;&#47; Les états des broches on l&#39;on écrit</font>
    <font color="#00979c">int</font> <font color="#000000">relay_state</font> <font color="#434f54">=</font> <font color="#00979c">LOW</font><font color="#000000">;</font>
    <font color="#00979c">int</font> <font color="#000000">led_state</font> <font color="#434f54">=</font> <font color="#00979c">LOW</font><font color="#000000">;</font>

    <font color="#434f54">&#47;&#47; Le réseau wifi</font>
    <font color="#00979c">const</font> <font color="#00979c">char</font><font color="#434f54">*</font> <font color="#000000">ssid</font> <font color="#434f54">=</font> <font color="#005c5f">&#34;le_reseau_local&#34;</font><font color="#000000">;</font>
    <font color="#00979c">const</font> <font color="#00979c">char</font><font color="#434f54">*</font> <font color="#000000">password</font> <font color="#434f54">=</font> <font color="#005c5f">&#34;le_mot_de_passe_local&#34;</font><font color="#000000">;</font>

    <font color="#434f54">&#47;&#47; AnalogRead alternatif</font>
    <font color="#00979c">int</font> <font color="#000000">alt_analogRead</font><font color="#000000">(</font><font color="#00979c">int</font> <font color="#000000">pin</font><font color="#000000">)</font> <font color="#000000">{</font>
    <font color="#000000">WRITE_PERI_REG</font><font color="#000000">(</font><font color="#000000">SENS_SAR_READ_CTRL2_REG</font><font color="#434f54">,</font> <font color="#000000">reg_b</font><font color="#000000">)</font><font color="#000000">;</font>
    <font color="#000000">SET_PERI_REG_MASK</font><font color="#000000">(</font><font color="#000000">SENS_SAR_READ_CTRL2_REG</font><font color="#434f54">,</font> <font color="#000000">SENS_SAR2_DATA_INV</font><font color="#000000">)</font><font color="#000000">;</font>
    <font color="#5e6d03">return</font> <font color="#d35400">analogRead</font><font color="#000000">(</font><font color="#000000">pin</font><font color="#000000">)</font><font color="#000000">;</font>
    <font color="#000000">}</font>

    <font color="#434f54">&#47;&#47; Fonction pour amorcer la caméra</font>
    <font color="#00979c">void</font> <font color="#000000">init_camera</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<font color="#000000">camera_config_t</font> <font color="#d35400">config</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">ledc_channel</font> <font color="#434f54">=</font> <font color="#000000">LEDC_CHANNEL_0</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">ledc_timer</font> <font color="#434f54">=</font> <font color="#000000">LEDC_TIMER_0</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d0</font> <font color="#434f54">=</font> <font color="#000000">Y2_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d1</font> <font color="#434f54">=</font> <font color="#000000">Y3_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d2</font> <font color="#434f54">=</font> <font color="#000000">Y4_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d3</font> <font color="#434f54">=</font> <font color="#000000">Y5_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d4</font> <font color="#434f54">=</font> <font color="#000000">Y6_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d5</font> <font color="#434f54">=</font> <font color="#000000">Y7_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d6</font> <font color="#434f54">=</font> <font color="#000000">Y8_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_d7</font> <font color="#434f54">=</font> <font color="#000000">Y9_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_xclk</font> <font color="#434f54">=</font> <font color="#000000">XCLK_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_pclk</font> <font color="#434f54">=</font> <font color="#000000">PCLK_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_vsync</font> <font color="#434f54">=</font> <font color="#000000">VSYNC_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_href</font> <font color="#434f54">=</font> <font color="#000000">HREF_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_sscb_sda</font> <font color="#434f54">=</font> <font color="#000000">SIOD_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_sscb_scl</font> <font color="#434f54">=</font> <font color="#000000">SIOC_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_pwdn</font> <font color="#434f54">=</font> <font color="#000000">PWDN_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pin_reset</font> <font color="#434f54">=</font> <font color="#000000">RESET_GPIO_NUM</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">xclk_freq_hz</font> <font color="#434f54">=</font> <font color="#000000">20000000</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">pixel_format</font> <font color="#434f54">=</font> <font color="#000000">PIXFORMAT_JPEG</font><font color="#000000">;</font>

     &nbsp;<font color="#5e6d03">if</font> <font color="#000000">(</font><font color="#000000">psramFound</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">frame_size</font> <font color="#434f54">=</font> <font color="#000000">FRAMESIZE_UXGA</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">jpeg_quality</font> <font color="#434f54">=</font> <font color="#000000">10</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">fb_count</font> <font color="#434f54">=</font> <font color="#000000">2</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">}</font> <font color="#5e6d03">else</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">frame_size</font> <font color="#434f54">=</font> <font color="#000000">FRAMESIZE_SVGA</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">jpeg_quality</font> <font color="#434f54">=</font> <font color="#000000">12</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">config</font><font color="#434f54">.</font><font color="#000000">fb_count</font> <font color="#434f54">=</font> <font color="#000000">1</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">}</font>

     &nbsp;<font color="#000000">esp_err_t</font> <font color="#000000">err</font> <font color="#434f54">=</font> <font color="#000000">esp_camera_init</font><font color="#000000">(</font><font color="#434f54">&amp;</font><font color="#d35400">config</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#5e6d03">if</font> <font color="#000000">(</font><font color="#000000">err</font> <font color="#434f54">!=</font> <font color="#000000">ESP_OK</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">printf</font><font color="#000000">(</font><font color="#005c5f">&#34;Erreur lors de l&#39;initialisation de la caméra : 0x%x&#34;</font><font color="#434f54">,</font> <font color="#000000">err</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#5e6d03">return</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">}</font>
    <font color="#000000">}</font>

    <font color="#00979c">void</font> <font color="#000000">send_a_picture</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<font color="#000000">esp_http_client_config_t</font> <font color="#d35400">config</font> <font color="#434f54">=</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;<font color="#434f54">.</font><font color="#000000">url</font> <font color="#434f54">=</font> <font color="#005c5f">&#34;http:&#47;&#47;192.168.1.254&#47;plantbot&#47;reception_image.php&#34;</font>
     &nbsp;<font color="#000000">}</font><font color="#000000">;</font>

     &nbsp;<font color="#000000">esp_http_client_handle_t</font> <font color="#d35400">client</font> <font color="#434f54">=</font> <font color="#000000">esp_http_client_init</font><font color="#000000">(</font><font color="#434f54">&amp;</font><font color="#d35400">config</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">esp_http_client_set_post_field</font><font color="#000000">(</font><font color="#d35400">client</font><font color="#434f54">,</font> <font color="#000000">(</font><font color="#00979c">const</font> <font color="#00979c">char</font> <font color="#434f54">*</font><font color="#000000">)</font><font color="#000000">fb</font><font color="#434f54">-</font><font color="#434f54">&gt;</font><font color="#000000">buf</font><font color="#434f54">,</font> <font color="#000000">fb</font><font color="#434f54">-</font><font color="#434f54">&gt;</font><font color="#000000">len</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">esp_http_client_set_method</font><font color="#000000">(</font><font color="#d35400">client</font><font color="#434f54">,</font> <font color="#000000">HTTP_METHOD_POST</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">esp_http_client_set_header</font><font color="#000000">(</font><font color="#d35400">client</font><font color="#434f54">,</font> <font color="#005c5f">&#34;Content-type&#34;</font><font color="#434f54">,</font> <font color="#005c5f">&#34;image&#47;jpg&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">esp_err_t</font> <font color="#000000">err</font> <font color="#434f54">=</font> <font color="#000000">esp_http_client_perform</font><font color="#000000">(</font><font color="#d35400">client</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#5e6d03">if</font> <font color="#000000">(</font><font color="#000000">err</font> <font color="#434f54">==</font> <font color="#000000">ESP_OK</font><font color="#000000">)</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;Image envoyée&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#5e6d03">else</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">printf</font><font color="#000000">(</font><font color="#005c5f">&#34;erreur %d lors de l&#39;envoi de l&#39;image\r\n&#34;</font><font color="#434f54">,</font> <font color="#000000">err</font><font color="#000000">)</font><font color="#000000">;</font>

     &nbsp;<font color="#000000">esp_http_client_cleanup</font><font color="#000000">(</font><font color="#d35400">client</font><font color="#000000">)</font><font color="#000000">;</font>

     &nbsp;<font color="#000000">esp_camera_fb_return</font><font color="#000000">(</font><font color="#000000">fb</font><font color="#000000">)</font><font color="#000000">;</font>
    <font color="#000000">}</font>

    <font color="#00979c">void</font> <font color="#000000">take_a_picture</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<font color="#000000">fb</font> <font color="#434f54">=</font> <font color="#000000">esp_camera_fb_get</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#5e6d03">if</font><font color="#000000">(</font><font color="#434f54">!</font><font color="#000000">fb</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;Echec de la capture d&#39;image :(&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#5e6d03">return</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">}</font> <font color="#5e6d03">else</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;Image enregistrée avec succès :)&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">}</font>
    <font color="#000000">}</font>

    <font color="#00979c">void</font> <font color="#000000">start_wifi</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>

     &nbsp;&nbsp;<b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">begin</font><font color="#000000">(</font><font color="#000000">ssid</font><font color="#434f54">,</font> <font color="#000000">password</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">1</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#5e6d03">while</font><font color="#000000">(</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">status</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#434f54">!=</font> <font color="#000000">WL_CONNECTED</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">500</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;On attend la connection wifi...&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d35400">yield</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; Pour éviter que le watchdog ne fasse redémarrer la carte.</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">}</font>

     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;WiFi connecté&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">localIP</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">wifi_status</font> <font color="#434f54">=</font> <font color="#00979c">true</font><font color="#000000">;</font>
    <font color="#000000">}</font>

    <font color="#00979c">void</font> <font color="#000000">end_wifi</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>

     &nbsp;<b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">disconnect</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">1</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">mode</font><font color="#000000">(</font><font color="#000000">WIFI_OFF</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">1</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;<font color="#5e6d03">while</font><font color="#000000">(</font><b><font color="#d35400">WiFi</font></b><font color="#434f54">.</font><font color="#d35400">status</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#434f54">==</font> <font color="#000000">WL_CONNECTED</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">500</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;On attend la déconnection du wifi&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d35400">yield</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">}</font>
     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;WiFi déconnecté&#34;</font><font color="#000000">)</font><font color="#000000">;</font>

    <font color="#000000">}</font>

    <font color="#434f54">&#47;&#47; Allumer le flash</font>
    <font color="#00979c">void</font> <font color="#000000">lights_on</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<font color="#d35400">digitalWrite</font><font color="#000000">(</font><font color="#000000">led_pin</font><font color="#434f54">,</font> <font color="#00979c">HIGH</font><font color="#000000">)</font><font color="#000000">;</font>
    <font color="#000000">}</font>

    <font color="#434f54">&#47;&#47; Éteindre le flash</font>
    <font color="#00979c">void</font> <font color="#000000">lights_off</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<font color="#d35400">digitalWrite</font><font color="#000000">(</font><font color="#000000">led_pin</font><font color="#434f54">,</font> <font color="#00979c">LOW</font><font color="#000000">)</font><font color="#000000">;</font>
    <font color="#000000">}</font>

    <font color="#434f54">&#47;&#47; Arrosage</font>
    <font color="#00979c">void</font> <font color="#000000">watering</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<font color="#5e6d03">for</font><font color="#000000">(</font><font color="#00979c">int</font> <font color="#000000">i</font><font color="#434f54">=</font><font color="#000000">0</font><font color="#000000">;</font> <font color="#000000">i</font><font color="#434f54">&lt;</font><font color="#000000">NB_CYCLE_WATERING</font><font color="#000000">;</font> <font color="#434f54">++</font><font color="#000000">i</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">print</font><font color="#000000">(</font><font color="#005c5f">&#34; -&gt; Cycle numero &#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#000000">i</font><font color="#000000">)</font><font color="#000000">;</font>

     &nbsp;&nbsp;&nbsp;<font color="#000000">relay_state</font> <font color="#434f54">=</font> <font color="#00979c">HIGH</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">digitalWrite</font><font color="#000000">(</font><font color="#000000">relay_pin</font><font color="#434f54">,</font> <font color="#000000">relay_state</font><font color="#000000">)</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; On arrose !</font>

     &nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">WATERING_TIME</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">relay_state</font> <font color="#434f54">=</font> <font color="#434f54">!</font><font color="#000000">relay_state</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">digitalWrite</font><font color="#000000">(</font><font color="#000000">relay_pin</font><font color="#434f54">,</font> <font color="#000000">relay_state</font><font color="#000000">)</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; On éteint l&#39;arrosage</font>

     &nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">TIME_BTWN_WATERING</font><font color="#000000">)</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; On attend un peu que l&#39;eau pénetre dans la terre</font>
     &nbsp;<font color="#000000">}</font>
    <font color="#000000">}</font>


    <font color="#00979c">void</font> <font color="#5e6d03">setup</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>
     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">begin</font><font color="#000000">(</font><font color="#000000">115200</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">pinMode</font><font color="#000000">(</font><font color="#000000">moist_pin</font><font color="#434f54">,</font> <font color="#00979c">INPUT</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">pinMode</font><font color="#000000">(</font><font color="#000000">relay_pin</font><font color="#434f54">,</font> <font color="#00979c">OUTPUT</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">pinMode</font><font color="#000000">(</font><font color="#000000">led_pin</font><font color="#434f54">,</font> <font color="#00979c">OUTPUT</font><font color="#000000">)</font><font color="#000000">;</font>

     &nbsp;<font color="#d35400">digitalWrite</font><font color="#000000">(</font><font color="#000000">relay_pin</font><font color="#434f54">,</font> <font color="#000000">relay_state</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#d35400">digitalWrite</font><font color="#000000">(</font><font color="#000000">led_pin</font><font color="#434f54">,</font> <font color="#000000">led_state</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">init_camera</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">lights_off</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>

     &nbsp;<font color="#000000">reg_b</font> <font color="#434f54">=</font> <font color="#000000">READ_PERI_REG</font><font color="#000000">(</font><font color="#000000">SENS_SAR_READ_CTRL2_REG</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;
     &nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">2000</font><font color="#000000">)</font><font color="#000000">;</font> <font color="#434f54">&#47;&#47; Pour s&#39;assurer que tout est bien initialisé (capteurs, wifi, etc..)</font>
    <font color="#000000">}</font>


    <font color="#00979c">void</font> <font color="#5e6d03">loop</font><font color="#000000">(</font><font color="#000000">)</font> <font color="#000000">{</font>

     &nbsp;<font color="#00979c">int</font> <font color="#000000">v_moist</font> <font color="#434f54">=</font> <font color="#000000">alt_analogRead</font><font color="#000000">(</font><font color="#000000">moist_pin</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">print</font><font color="#000000">(</font><font color="#005c5f">&#34;Taux d&#39;humidité de la terre : &#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#000000">v_moist</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#5e6d03">if</font><font color="#000000">(</font><font color="#000000">v_moist</font> <font color="#434f54">&lt;=</font> <font color="#000000">MAX_MOIST_VAL</font><font color="#000000">)</font> <font color="#000000">{</font> <font color="#434f54">&#47;&#47; tres mouillé</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">print</font><font color="#000000">(</font><font color="#005c5f">&#34;C&#39;est mouillé ! on va faire dodo pendant &#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">print</font><font color="#000000">(</font><font color="#000000">SLEEPING_TIME</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34; milli-secondes&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">SLEEPING_TIME</font><font color="#000000">)</font><font color="#000000">;</font>

     &nbsp;<font color="#000000">}</font> <font color="#5e6d03">else</font> <font color="#5e6d03">if</font><font color="#000000">(</font><font color="#000000">v_moist</font> <font color="#434f54">&gt;=</font> <font color="#000000">MIN_MOIST_VAL</font><font color="#000000">)</font> <font color="#000000">{</font> <font color="#434f54">&#47;&#47; tres sec</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">start_wifi</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">lights_on</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">take_a_picture</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">lights_off</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">send_a_picture</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">end_wifi</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#000000">watering</font><font color="#000000">(</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">println</font><font color="#000000">(</font><font color="#005c5f">&#34;Arrosage terminé&#34;</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;&nbsp;&nbsp;<font color="#d35400">delay</font><font color="#000000">(</font><font color="#000000">2000</font><font color="#000000">)</font><font color="#000000">;</font>
     &nbsp;<font color="#000000">}</font>
     &nbsp;
    <font color="#000000">}</font>

</pre>
</body>
</html>
