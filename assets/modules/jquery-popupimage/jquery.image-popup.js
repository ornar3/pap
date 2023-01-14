//questa è una funzione "self-enclosed", 
//ora la possiamo richiamare come se fosse una evento/azione

(function($){
    //Sintassi per definire un plugin in jQuery
    $.fn.imagePopup = function(options){   //imagePopup sarà il nome del nostro plugin, options riceve i valori da app.js

        //settings sarà la variabile usata per recuperare le properties di options
        //queste sono le properties di default
        var settings = $.extend({   //.extend, estendo le properties di options
            overlay: "rgba(0, 0, 0, 0.5)",
            closeButton: {  //qui metto le properties di default del bottone close 
                src: null,
                width: "30px",
                height:"30px"
            },
            imageBorder: "5px solid #ffffff",
            borderRadius: "5px",
            imageWidth: "500px",
            imageHeight: "400px",
            imageCaption: {
                exist: true,
                color: "#ffffff",
                fontSize: "20px"
            },
            open: null,
            close: null
        }, options);    //options qui sostituirà il valore di overlay qui dentro
        //se non mando nulla da app.js, il valore di default sarà l'overlay definito qui sopra
        
        /**
         * Iterating through each image gallery
         */
        return this.each(function(){
            /**
             * Declaring new element(s) variables
             */
            var $overlay, $closeButton, $image, $imageCaption;  //definiamo le variabili
            setOverlayProperties();
            setCloseButtonProperties();
            setImageProperties();

            /**
             * this. seleziona la reference a #imageGallery presente in app.js
             * find serve a trovare l'elemento anchor, on click
             * gli do una funzione con un parametro event
             */
            $(this).find("a").on("click", function(event){
                event.preventDefault();    //questo stopperà il default behavior del nostro <a> per il nostro evento

                var imageSource = $(this).children("img").attr("src");
                $image.attr("src", imageSource);

                if(settings.imageCaption.exist == true){
                    var caption = $(this).children("img").attr("alt");
                    $imageCaption.text(caption);
                }

                if($.isFunction(settings.open)){    //controllo che la property open sia not null
                    settings.open.call(this);   //questo eseguirà la funzione in app.js su qualsiasi img aperta
                }

                //$overlay.show();    //questo mostrerà il mio overlay a ogni click sulle immagini
                $overlay.css({opacity: 0.1}).show().animate({opacity: 1});
            });

            function setImageProperties(){
                $image = $('<img>');
                $image.css(
                    {
                        "width": settings.imageWidth,
                        "height": settings.imageHeight,
                        "border": settings.imageBorder,
                        "border-radius": settings.borderRadius
                    }
                )
                $overlay.append($image);

                if(settings.imageCaption.exist == true){
                    $imageCaption = $('<p></p>');
                    $imageCaption.css({
                        "color": settings.imageCaption.color,
                        "font-size": settings.imageCaption.fontSize
                    });

                    $overlay.append($imageCaption);
                };
            };

            function setOverlayProperties(){
                $overlay = $('<div></div>'); //con questa riga, posso scrivere l'elemento che voglio creare, in questo caso un <div>
                $overlay.css({
                    "background": settings.overlay, //uso la proprietà nella mia variabile settings
                    "position": "absolute",
                    "top": "0px",
                    "left": "0px",
                    "display": "none",
                    "text-align": "center",
                    "width": "100%",
                    "height": "100%",
                    "padding-top": "5%"
                });
                $("body").append($overlay); //in questo modo aggiungo all'elemento body la mia variabile overlay con le sue proprietà
            };
            
            function setCloseButtonProperties(){ //properties del bottone close
                var prop = {
                    "color": "white",
                    "cursor": "pointer",
                    "font-size": "20px",
                    "width": settings.closeButton.width,
                    "height": settings.closeButton.height,
                    "position": "absolute",
                    "top": "5px",
                    "right": "5px",
                    "border": "0px",
                    "z-index": "1"
                };
            

                if(settings.closeButton.src) {  //se src ha un valore
                    $closeButton = $("<img>");
                    $closeButton.attr("src", settings.closeButton.src);
                } else {    //se invece è null
                    $closeButton = $("<span>X</span>");
                }

                //setto le prop definite sopra al bottone, che sia span o img
                $closeButton.css(prop);
                //aggiungo l'elemento closeButton all'overlay button
                $overlay.append($closeButton);
            };

            $closeButton.click(function(){  //grazie a questo, quando clicco sulla x(closeButton) mi nasconde l'overlay
                if($.isFunction(settings.close)){
                    settings.close.call(this);
                };

                $overlay.animate({opacity: 0.1}, function(){
                    $overlay.hide();
                });               
            });
        });
    };
}(jQuery)); //Questa è una funzione anonima
