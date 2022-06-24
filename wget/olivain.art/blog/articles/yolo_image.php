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

  <title>Machine à images</title>
  <link rel="stylesheet" type="text/css" href="../../fonts.css">
  <link rel="stylesheet" type="text/css" href="../../style3.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
  <script>hljs.highlightAll();</script>

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
        <h1>Machine à images</h1>
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Il est amusant d'utiliser un algorithme de détection d'objets sur un ensemble d'images pour en voir les résultats et les erreurs. Souvent, les modèles comme YoloV3 sont utilisés dans des projets de robotique, avec des machines capables de percevoir leur environnement pour y réagir. L'autre usage très populaire consiste en un dispositif de surveillance. Dans tous les cas, il s'agit toujours de lire une image. En dénommant ce qu'il détecte dans l'image, le programme crée une lecture de celle-ci. Ce faisant, il propose une situation nouvelle. L'idée qu'un algorithme de détection (et non de génération) puisse être utilisé de manière créative et produise des images capables d'engager le spectateur dans le processus de réalisation de celles-ci m'a titillé.
            <br><br>
            Il n'est pas rare que des algorithmes produisent des images. Le geste de l'artiste face à celui de la machine est un thème qui a été exploré avidement par les créateurs. Ceux-ci se positionnent alors en coordinateur, en maître d’œuvre observant la machine qui produit les images. Ils sélectionnent les productions dans le large choix qu'offre la machine ou alors ils restent dans la situation d'opérateur, configurant la machine.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="http://olivain.art/blurd/Vnb4YahtVZVu.jpg">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Dans l'exercice qui nous intéresse ici il s'agit d'exploiter l'autonomie de l'algorithme, sa capacité à faire émerger, par son fonctionnement structurel même, une nouvelle image sans pour autant inventer, générer, cette image. Il est ainsi question de transformer des images existantes et, surtout, d’apprécier la surprise que provoque l'application de l'algorithme a celles-ci. Si les images sont déjà existantes, c'est donc que les représentations sont déjà posées, qu'elle est déjà une représentation en elle-même. Appliquer un algorithme de détection d'objet a une image revient a en effectuer une lecture par le biais de la machine. Mais l'image lue par la machine doit pouvoir être renvoyée, rendue disponible pour un observateur humain et, pour cela, adopter une forme visuelle nouvelle capable de transmettre la nouvelle lecture.
            <br><br>
            Pour explorer la capacité d'une machine a produire et transmettre une lecture nouvelle d'une image existante, j'ai décidé d'utiliser le réseau de neurones  <a href="https://pjreddie.com/darknet/yolo/" target="_blank"> YOLOv3</a> à travers les librairies OpenCV en Python3 et, surtout, d'utiliser les possibilités de ces ensembles programmatiques pour non pas mettre en valeur mais modifier, suggérer, faire apparaître. C'est en sens que m'est apparue pertinente l'utilisation du flou. C'est souvent dans une démarche d'invisibilisation que se trouve utilise le flou dans les images contemporaines. Ce sont les images volées, enregistrées a l'insu de leurs sujets, que l'on trouve cet effet de buée permettant de préserver l'anonymat d'un individu. Sur des applications telles que Google Street View, le floutage est aussi utilise pour rendre illisible des plaques d'immatriculation, la encore pour protéger une identité. Si le flou est utilise pour invisibiliser, c'est aussi qu'il laisse entrevoir ce qui est cache, qu'il permet de suggérer, de montrer en supprimant toute singularité. Ainsi, le flou permet de montrer en visage général avec le peu de détails nécessaires à le contextualiser, tout en cachant ses spécificités, rides, balafres et autres grains de beauté.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="https://929687.smushcdn.com/2407837/wp-content/uploads/2020/04/opencv_face_blurring_step4.jpg?lossy=1&strip=1&webp=0">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            À la lumière de cette réflexion, un algorithme de détection d'objets permet alors de localiser des éléments dans une image et, grâce a l'application du flou, de transformer l'objet sans le cacher, de le modifier tout en le laissant accessible. Mais l'algorithme nomme aussi les choses. En détectant et localisant un élément dans une image il y associe également un mot qui, s'il ne constitue pas en soi une forme graphique, fait apparaître, lorsqu'il est lu, une représentation. Il m'est alors apparu intéressant d'utiliser cette capacité à nommer et ce d'autant plus que l'algorithme possède aussi la capacité de se tromper.
            <br><br>
            Sur mon système d'exploitation Ubuntu 20.04, J'ai installé les librairies OpenCV-4.5.3 en utilisant le gestionnaire de paquets Pip (Je me suis rendu compte que le script ne fonctionnait pas avec OpenCV-4.5.4, je me suis donc limité à la version précédente).</p>
          </p>
        </span>
      </div>


      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <pre>
python3 -m pip install opencv-python==4.5.3
          </pre>
        </span>
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            J'ai pu ensuite m'atteler a la rédaction proprement dite. J'ai débuté par l’intégration de l'algorithme de YOLOv3 dans mon script python. La première étape dans cet objectif a été de télécharger les fichiers du modèle de réseau de neurones préalablement entraîné sur une base de données d'éléments divers : <a target="_blank" href="https://cocodataset.org/#home">"Common Objects in COntext"</a>. Trois fichiers sont à télécharger : la configuration du réseau de neurones, sa hiérarchisation et les noms des objets sur lesquels le modèle a été entraîné :
          </p>
        </span>
      </div>


      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <pre>
wget <a target="_blank" href="https://olivain.art/wannabeblog/misc/coco.names">https://olivain.art/wannabeblog/misc/coco.names</a>
wget <a target="_blank" href="https://olivain.art/wannabeblog/misc/yolov3.cfg">https://olivain.art/wannabeblog/misc/yolov3.cfg</a>
wget <a target="_blank" href="https://olivain.art/wannabeblog/misc/yolov3.weights">https://olivain.art/wannabeblog/misc/yolov3.weights</a>
          </pre>
        </span>
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Le script nécessaire pour détecter et localiser des éléments dans une image est assez simple. J'ai rédigé ce dernier en y incluant le floutage des éléments détectés et l'apposition, sur l'image, du terme qui se trouve associe à chaque élément détecté. OpenCV ne permet l'utilisation que d'un nombre <a target="_blank" href="https://codeyarns.com/tech/2015-03-11-fonts-in-opencv.html">limité</a> de polices d'écriture. Je me suis donc résolu à inclure une nouvelle librairie dans mon programme. Pillow est une librairie de gestion d'images qui permet d'afficher, modifier et enregistrer des images. Je m'en suis alors servi pour charger la police de mon choix (<a target="_blank" href="https://www.fontsquirrel.com/fonts/roboto-slab">Roboto Slab</a>) et poser le texte sur l'image.
          </p>
        </span>
      </div>


      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <pre>
            <code class="language-python">
  from PIL import Image, ImageFont, ImageDraw, ImageTk
  import cv2
  import numpy as np
  import os

  currentPath = os.getcwd()+"/" # chemin actuel dans lequel se situe le programme
  config_path = currentPath+"yolov3.cfg" # organisation du reseau de neurones
  weights_path = currentPath+"yolov3.weights" # hierarchie du reseau de neurones
  labels = open(currentPath+"coco.names").read().strip().split("\n") # noms des objets detectables
  fontFileName=currentPath+'RobotoSlab-Regular.ttf' # police pour affichage sur l'image
  fontSize = 25 # taille de la police
  loadedFont = ImageFont.truetype(fontFileName,fontSize) # chargement de la police pour affichage dans la fenetre
  blurRate = 25 # taux de flou
  CONFIDENCE = 0.5 #taux de confiance (50%)
  SCORE_THRESHOLD = 0.5
  IOU_THRESHOLD = 0.5
  boxes, confidences, class_ids = [], [], [] # tableaux utiles pour la detection

  imgTarget = "./imgs/test.png" # image a soumettre a l'algorithme
  image = cv2.imread(imgTarget) # ouverture de l'image
  origh, origw = image.shape[:2] #taille originale de l'image
  net = cv2.dnn.readNetFromDarknet(config_path, weights_path) # initialisation du reseau de neurones
  # tranformation de l'image reduite en "blob" pur traitement par le reseau de neurones :
  blob = cv2.dnn.blobFromImage(image, 1/255.0, (416, 416), swapRB=True, crop=False)
  image.shape: (1200, 1800, 3) #?
  blob.shape: (1, 3, 416, 416) #?
  # on envoie le blob au reseau de neurones
  net.setInput(blob)
  #obtention des differentes couches du reseau
  ln = net.getLayerNames()
  ln = [ln[i[0] - 1] for i in net.getUnconnectedOutLayers()] # /!\ Cette ligne echoue avec openCV 4.5.4 mais pas avec openCV 4.5.3 !!!!!
  layer_outputs = net.forward(ln) # on effectue la detection d'objets
  for output in layer_outputs: #pour chaque valeurs retournee par les couches du reseau de neurones..
    for detection in output: #pour chaque detection dans chaque valeur..
      scores = detection[5:] # informations sur la detection
      class_id = np.argmax(scores) #extraction de l'ID detecte (quel objet?)
      confidence = scores[class_id] #extraction du taux de confiance dans la detection effectuee
      if confidence > CONFIDENCE: # si le taux de confiance est superieur au niveau minimum defini (50%)
        box = detection[:4] * np.array([origw, origh, origw, origh])  # obtention des coordoonees
        (centerX, centerY, width, height) = box.astype("int") ## obtention des coordoonees du centre de l'objet detecte et de sa taille
        coord_x = int(centerX - (width / 2)) # coordonnee x du point haut gauche
        coord_y = int(centerY - (height / 2)) # coordonnee y du point haut gauche
        boxes.append([coord_x, coord_y, int(width), int(height)]) # ajout des coordoonees et taille de l'objet a la liste des objets
        confidences.append(float(confidence)) # ajout du taux de confiance pour cet objet a a liste des taux de confiance
        class_ids.append(class_id) # ajout de l'id de l'objet detecte a la liste des IDs des objets detectes

  # la fonction suivante supprime d'eventuelles detections multiples d'un meme objet
  # (cf. https://learnopencv.com/non-maximum-suppression-theory-and-implementation-in-pytorch/ ) :
  idxs = cv2.dnn.NMSBoxes(boxes, confidences, SCORE_THRESHOLD, IOU_THRESHOLD)
  #si nous avons au moins un objet detecte
  if len(idxs) > 0:
    # Iterations dans les donnees recuperees (detections) pour dessin et floutage de l'image
    for i in idxs.flatten():
      x, y = boxes[i][0], boxes[i][1] # recuperation des coordonnees de l'objet detecte
      w, h = boxes[i][2], boxes[i][3] # recuperation de la hauteur et de la largeur de l'objet detecte
      #correction necessaire si les valeurs sont negatives:
      if (x < 0): x = 0
      if (y < 0): y = 0
      image = cv2.rectangle(image, (x, y), (x + w, y + h), color=(0,0,0), thickness=1) # on dessine un rectangle dans l'image a l'endroit de la detection
      text= f"{labels[class_ids[i]]}" # on prepare le texte (nom de l'objet detecte) pour dessin sur l'image
      image[y+1:y+h, x+1:x+w] = cv2.blur(image[y+1:y+h, x+1:x+w], (blurRate, blurRate)) # on floute le rectangle de la detection
      # pour ecrire le texte (label de l'objet detecte) sur les images et avec une police de notre choix
      # nous devons passer par PIL (la police est chargee, pour l'image reduite, en variable globale au debut du programme (loadedFont))
      im_p = Image.fromarray(image) #trasfert de l'image reduite depuis OpenCV (numpy) vers Pil
      draw = ImageDraw.Draw(im_p) #ouverture de l'image reduite pour dessin
      draw.text((x+2,y-2),text,(0,0,0),font=loadedFont) # pose du texte sur l'image reduite
      image = np.array(im_p)# conversion depuis Pil vers OpenCV (numpy)

  cv2.imshow("image",image) # affichage de l'image finale
  cv2.waitKey(0)
            </code>
          </pre>

        </span>
      </div>


      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Pour mes besoins exploratoires j'ai complexifié le programme ci-dessus de façon a lire toutes les images contenues dans un dossier et à intégrer l'affichage d'images dans une fenêtre graphique (GUI) en utilisant la librairie Tkinter.
            Le programme final peut être trouve à <a target="_blank" href="imageBlur.py.php">cette adresse</a>. Il permet, après la sélection d'un dossier dans lequel sont stockées des images au format jpeg et png, de faire défiler ces images passées à la moulinette de l'algorithme et de les enregistrer si leur résultat se trouve intéressant.
          </p>
        </span>
      </div>


      <div class="col col--3x">
        <img src="../imgs/imageBlur_3.jpg">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Ce qui apparaît au premier abord dans ces images, c'est en fait leur qualité, inattendue, de collage. Le rectangle flou vient s'apposer par-dessus l'image originale et s'extrait alors de celle-ci. L'image originale devient un support, est mise au second plan pour éloigner de l'observateur. La superposition, l'action de coller, relève elle d'un détournement tautologique. En superposant à l'image originale une version trafique d'elle-même, l’élément mis en valeur, caché et suggéré, se trouve décontextualise et devient alors le véritable sujet du processus créatif. Il est présenté plutôt que représenté et perd de son objectivité pour s'inscrire comme représentation spécifique à l'observateur.
          </p>
        </span>
      </div>

      <div class="col col--3x">
        <img src="../imgs/imageBlur_4.jpg">
      </div>

      <div class="col col--4x colText textContainer">
        <span class="regularText">
          <p>
            Autre élément de collage, le texte ajoute au retournement en (mal)nommant les éléments floutés. S'il consiste en un élément graphique important, il vient tenter de définir la représentation proposée par le collage d'images et parfois entre en contradiction avec celui-ci.
            Le flou laisse à l'observateur la possibilité d'apercevoir, de déchiffrer l'image, mais le texte vient contrebalancer ce décodage en affirmant la nature du sujet tel que représenté. Issu de la machine et même de l'auteur de la base de données utilisée par l'algorithme, le texte termine de redéfinir l'image et fait l'inclusion de l'observateur tant il peut s’avérer absurde et nécessiter de ce dernier qu'il reconstruise l'image dans son esprit.
            <br><br>
            Texte et image, collages et erreurs de la machine s'associent pour transformer des images, en produire des lectures, des interprétations qui, si elles s’avèrent purement machiniques, n'en sont pas moins des formes d'expressions surréalistes. L'image ci-dessus, "bed/refrigerator" n’évoque t-elle pas elle-même la célèbre tirade de Lautréamont et véritable moto des surréalistes du 20ᵉ siècle :
            <i>"Beau comme la rencontre fortuite sur une table de dissection d’une machine à coudre et d’un parapluie."</i>
            <br>
            <br>
          </p>
        </span>
      </div>

      <div class="blogPagesNav">
        <div style="float: right;"><a href="vaudourobotique.php">Robotique vaudou
 >></a></div><div style="float: left;"><a href="vx_exhib_a.php"><< vx.exhib.a
</a></div>      </div>

    </div>
  </div>



</body>
</html>
