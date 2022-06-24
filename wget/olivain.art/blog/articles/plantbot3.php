<!doctype html>
<html lang="fr">
<head>
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
    <div class="masonryBlog">
      <div class="col colText">
        <h1>Robot-Plante</h1>
      </div>
      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Durant la période de confinement, j'ai pu consacrer du temps à mes plantes.
            Entretenir des interactions avec ces créatures n'est pas une chose facile.
            Pourtant, je suis depuis longtemps fasciné par le poème de Richard Brautigan,
            <a target="_blank" href="https://faculty.atu.edu/cbrucker/Amst2003/Texts/BrautiganPoems.pdf">"All watched over machines of loving grace"</a>,
            et je rêve, moi aussi, à une harmonie
            mutuelle entre plantes, machines et humains.
            Quoi qu'en dise Adam Curtis <a target="_blank" href="docs/The_cybernetic_forest_Critique_of_ecolog.pdf">dans sa série documentaire nommée d'après le poème de Brautigan</a>,
            je reste persuadé
            que la pensée systèmique et la création de machines, robots et autres objets électroniques peut permettre l'ouverture aussi bien des esprits
            que des shakra quant à notre approche de la "nature"
            <a target="_blank" href="https://play.acast.com/s/les-reporterriens/3180882a-81c1-4faf-a23d-e48d458d56d5">(qui n'existe pas)</a>.
            <br>
            Pour explorer cette idée, je me suis attelé à la fabrication de robot-plante !
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="http://olivain.art/blog/imgs/plantbot1.jpg">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">

          <p>
            Évidement, la première chose à laquelle on pense lorsqu’on imagine
            une machine qui prend soin d’une plante, c’est l’arrosage.
            Une telle fonctionnalité constitue un projet trivial de makers et
            les tutoriels à ce sujet pullulent sur internet. Il me fallait agrémenter
            une telle machine de fonctionnalités plus évoluées capables de produire
            une perception de la plante. Intuitivement je me suis inspiré de ce que
            font les humains pour interagir avec les plantes : les regarder avec attention.
            Pour mon premier essai j’ai donc décidé de monter une pompe a eau 12v
            sur un relay-switch permettant de l’activer et de la désactiver,
            puis de me concentrer sur l’utilisation d’une caméra JeVois A33,
            elle même montée sur deux petits servomoteurs permettant de la diriger en avant,
            en arrière et de gauche à droite.
          </p>
        </span>
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            C’est un poireau qui fût candidat à l’expérience. Ce légume est étonnamment facile à faire pousser et il était aisé de s’en fournir en pleine période de confinement.
            La fonction d’arrosage était facile à mettre en place. Le capteur d’humidité renvoyait au contrôleur (un esp8266 modèle Lolin V3) une valeur changeante en fonction de la conductivité (et donc de la quantité d’eau) de la terre. Lorsque cette valeur atteint un certain seuil de sécheresse, le contrôleur activait la pompe à eau sur une durée déterminée de quelques secondes.
            La caméra JeVois A33 est un véritable ordinateur à elle seule. Elle embarque un CPU/GPU et de nombreux modules de vision par ordinateur y sont pré-installés. Je l’ai alors programmée de façon a ce qu’elle lance un module de classification d’objets :
            <a target="_blank" href="https://pjreddie.com/darknet/yolo">YoloV3</a>.
            Régulièrement, elle était activée par le biais d’un second relay-switch et transmettait au contrôleur, par les pins séries (Tx / Rx) le nom des objets qu’elle détectait en observant la plante.
            Afin de visualiser tout ça, j’ai ensuite écrit une petite interface web qui stockait et affichait les résultats obtenus.
          </p>

        </span>
      </div>


      <div class="col col--3x">
        <img src="../imgs/web_interface1.png">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Ce premier robot-plante était un peu gros et trop sous-optimal à mon goût. La consommation électrique de l’ensemble était importante avec deux transformateurs 5v 2A et un transformateur 12v pour la pompe.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="../imgs/plantbot1_electro.jpg">
      </div>

      <div class="col col--3x">
        <img src="../imgs/schema_plantbot1.png">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            J’ai donc décidé de tout recommencer à zéro. <br><br>
            Dans le premier robot-plante, j’avais utilisé un capteur résistif d’humidité du sol. Les pattes de métal de ces capteurs sont exposées à l’eau et à la terre. Ils subissent rapidement la corrosion et deviennent inutilisables tout en libérant des substances toxiques dans la terre. Je me suis donc fourni un capteur capacitif, d’une bien meilleure durée de vie.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="../imgs/bad_sensor.png">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Je me suis également procuré une petite pompe à eau fonctionnelle à 3-5v, un relay et surtout un micro-contrôleur ESP32-CAM. Ce contrôleur ESP32 est équipé
            d’une petite caméra et permet des connectivité WiFi et Bluetooth.
            Pour alléger le système, j’ai imaginé ce nouveau robot-plante sans y intégrer
            l’unité de traitement de l’image (précédemment située dans la JeVois A33).
            Celle-ci sera, plus tard, déportée sur un raspberry-pi hébergeant un serveur.
            En séparant cet élément de l’ensemble  du robot-plante, ce dernier devient plus flexible et on peut
            alors envisager d’y placer une batterie de façon à ce qu’il soit le plus autonome possible.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="../imgs/plantbot3.1_bb.jpg">
      </div>


      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            D'un point de vue programmation, l’esp32-CAM n’est pas un micro-contrôleur très documenté. J’ai du me dépatouiller avec quelques problèmes techniques tels que la lecture de valeurs analogiques sur une pin ADC2 tout en utilisant le WiFi.
            Néanmoins je suis parvenu à <a target="_blank" href="esp32cam_analogread.php">régler ce soucis particulier</a>. Après avoir réussi à recevoir des valeurs du capteur d'humidité sur la broche GPIO14, je me suis assuré que le relay-switch pouvait être activé via la broche GPIO02, puis je me suis rendu compte
            que la broche GPIO04 permettait de contrôler une éblouissante diode electro-luminescente. Inclue sur la carte ESP32-Cam, cette DEL est destinée à être utilisée comme un flash d'appareil photo.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="../imgs/esp32cam_ultrabright_led.jpg">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Fort de ces petites expériences, je me suis attelé à la programmation du système d'irrigation et de photographie de la plante. L'image enregistrée à chaque arrosage doit être transmise, par l'ESP32-Cam, à un serveur connecté sur le réseau WiFi local.
            Pour arroser la plante, j'ai décidé de programmer un cycle dont les valeurs peuvent être modifiées plus tard. L'objectif est de faire en sorte que le serveur distant puisse ajuster les valeurs pour
            créer une forme d'auto-stabilisation entre la pousse de la plante et le comportement de la machine.<br><br>
            La procédure d'arrosage est écrite ainsi : </p>
          </span>
        </div>


        <div class="col col--4x colText regularText ">
          <pre>
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
              </pre>
            </span>
          </div>


          <div class="col col--4x colText textContainer">
            <span class="regularText">
              <p>
                Trois valeurs sont destinées à être ajustées par le serveur distant :<br>
                <li>WATERING_TIME correspond au temps durant lequel l'eau est acheminée jusqu'a la terre, le temps durant lequel la pompe est activée</li>
                <li>TIME_BTWN_WATERING correspond au temps d'attente entre deux activation de la pompe, essentiellement pour laisser à l'eau le temps de pénétrer la terre.</li>
                <li>NB_CYCLE_WATERING correspond au nombre de fois ou l'on active la pompe durant une session d'arrosage</li>
              </p>
            </span>
          </div>

          <div class="col col--3x">
            <img src="../imgs/plantbot3_pump1.jpg">
          </div>

          <div class="col col--4x colText textContainer">
            <span class="regularText">
              <p>
                Pour envoyer l'image au serveur, je me suis basé sur la librairie <a target="_blank" href="https://docs.espressif.com/projects/esp-idf/en/latest/esp32/api-reference/protocols/esp_http_client.html">esp_http_client</a>.
                Lorsque l'on capture une image avec l'ESP32-Cam, l'image est encodée dans la mémoire vive et accessible par l'objet "buf". Pour transmettre l'image et l'enregistrer sur le serveur distant, il suffit de forger une requête POST à destination d'un script php.
              </p>

            </span>
          </div>

          <div class="col col--4x colText textContainer">
            <span class="regularText">
              <pre>
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
&nbsp;&nbsp;&nbsp;<b><font color="#d35400">Serial</font></b><font color="#434f54">.</font><font color="#d35400">printf</font><font color="#000000">(</font><font color="#005c5f">&#34;erreur %d lors de l'envoi de l'image\r\n&#34;</font><font color="#434f54">,</font> <font color="#000000">err</font><font color="#000000">)</font><font color="#000000">;</font>

&nbsp;<font color="#000000">esp_http_client_cleanup</font><font color="#000000">(</font><font color="#d35400">client</font><font color="#000000">)</font><font color="#000000">;</font>

&nbsp;<font color="#000000">esp_camera_fb_return</font><font color="#000000">(</font><font color="#000000">fb</font><font color="#000000">)</font><font color="#000000">;</font>
<font color="#000000">}</font>
              </pre>
            </span>
          </div>

          <div class="col col--4x colText textContainer">
            <span class="regularText">
              <p>
                Le script PHP, lui, est extremement simple :
              </p>
            </span>
          </div>


          <div class="col col--4x colText textContainer">
            <span class="regularText">
              <pre>
<span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br>$received&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">file_get_contents</span><span style="color: #007700">(</span><span style="color: #DD0000">'php://input'</span><span style="color: #007700">);<br></span><span style="color: #0000BB">$fileToWrite&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"upload&nbsp;-&nbsp;"</span><span style="color: #007700">.</span><span style="color: #0000BB">time</span><span style="color: #007700">().</span><span style="color: #DD0000">".jpg"</span><span style="color: #007700">;<br></span><span style="color: #0000BB">file_put_contents</span><span style="color: #007700">(</span><span style="color: #0000BB">$fileToWrite</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$received</span><span style="color: #007700">);<br></span><span style="color: #0000BB">?&gt;</span>
</span>
              </pre>
            </span>
          </div>

          <div class="col col--4x colText textContainer">
            <span class="regularText">
              <p>
                Chaque donnée reçu par ce script sera enregistrée sous la forme d'un JPEG. Si je visite la page avec mon navigateur, il va créer un fichier jpeg vide. Mais notre ESP32-Cam, grâce au code ci-dessus, lui enverra les données de l'image qu'il va enregistrer.
                <br>
                Le code complet, dans son état actuel d'avancement, est disponible <a target="_blank" href="plantbot3.ino.php"> ici </a>. Pour l'instant, le serveur ne fait qu'enregistrer les images et la boucle de stabilisation n'est pas encore écrite.
              </p>

            </span>
          </div>

          <div class="blogPagesNav">
            <div style="float: right;"><a href="esp32cam_analogread.php">ESP32-CAM et AnalogRead
 >></a></div>          </div>

        </div>
      </div>

    </body>
    </html>
