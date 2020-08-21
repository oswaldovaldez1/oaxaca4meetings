<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViajesController extends Controller
{
    private $_viajes = [
        'viajes-oaxaca-sofisticado' => [
            'titulo' => 'OAXACA sofisticado.',
            'subtitulo' => 'El arte a través de tus sentidos.',
            'imgint' => 'images/experiencias/int-sofisticado.png',
            'imggal' => 'images/experiencias/img-gal-sofisticado.png',
            "color" => '#4e1477',
            "contenido" => "<p>Cuna de escritores, pintores, poetas y artistas destacados, así es Oaxaca. En este recorrido podrás admirar el alma artística del Estado, conversando con los artistas en sus propios talleres.</p>
                                <p>Disfruta, además, de un recorrido por un mercado tradicional, recolectando ingredientes endémicos de la cocina oaxaqueña para que posteriormente vivas la experiencia de cocinar al lado de un chef reconocido internacionalmente. ¡Descubre, crea y deléitate con los manjares que tú mismo prepararás! </p>",
            "duracion" => "10 horas.",
            "reservacion" => "Reserva en los teléfonos: (951) 351 1764 o (951) 351 1769.",
            "salida" => "Saliendo a las 8 am / Regresando a las 6 pm.",
            "include" => "Guía especializado, visita a taller de pintor, recorrido por mercado, taller gastronómico con chef (comida incluida).",
            "recomendacion" => "usar ropa cómoda y fresca."
        ],
        'viajes-colores-magicos' => [
            'titulo' => 'Colores mágicos.',
            'subtitulo' => 'La belleza natural de Oaxaca.',
            'imggal' => 'images/experiencias/img-gal-colores.png',
            'imgint' => 'images/experiencias/int-colores.png',
            "color" => '#b95509',
            "contenido" => "<p>Iniciamos el recorrido consintiendo al paladar con un exquisito desayuno oaxaqueño en el poblado de Tlacolula de Matamoros, respira el aire limpio y alegra la vista con el paisaje.</p>

                                <p>Seguiremos hacia Teotitlán del Valle, famoso por sus telares, textiles y la grana cochinilla que es una de las principales fuentes para dar color a su arte textil. ¡Diviértete dando color a tu propia pieza!</p>

                                <p>Después sigue descubriendo los colores, ahora en la comida, degustando el mole verde y el mole amarillo en una tradicional empanada de Santa María del Tule, lugar reconocido mundialmente por su <b>Árbol del Tule</b>, un ahuehuete  de más  de 2.000 años de antigüedad, reconocido por la UNESCO como Patrimonio Cultural de la Humanidad.</p>",
            "duracion" => "Duración 6 horas.",
            "reservacion" => "Reserva en los teléfonos: (951) 351 1764 o (951) 351 1769.",
            "salida" => "Saliendo a las 8 am / Regresando a las 2 pm.",
            "sugerencia" => "*Sugerimos realizar este recorrido en domingo, para recorrer y disfrutar en magnitud el Mercado de Tlacolula.",
            "include" => "Transporte, desayuno tradicional, guía, bebidas a bordo, acceso a talleres con artesanos y costo de las actividades con los mismos.",
            "recomendacion" => "usar ropa cómoda y fresca, llevar lentes de sol, sombrero/gorra, bloqueador solar, llevar una dosis de ingenio y creatividad."
        ],
        'viajes-deleite-en-las-montañas' => [
            'titulo' => 'DELEITE EN LAS MONTAÑAS',
            'subtitulo' => 'El origen de los sabores y colores',
            'imggal' => 'images/experiencias/img-gal-delicias.png',
            'imgint' => 'images/experiencias/int-deleite.png',
            "color" => '#009f3b',
            "contenido" => "<p>Vive la experiencia de cosechar y crear tu propia conserva.</p>
<p>Descubre la receta de uno de los 7 moles más importantes del estado: el chichilo. </p>
<p>Degusta del pinole, una deliciosa bebida tradicional y despierta tus sentidos elaborando tu propio pan artesanal. </p>",
            "duracion" => "2 días.",
            "reservacion" => "Reservaciones e información a los teléfonos: (951) 351 1764 o (951) 351 1769. ",
            "salida" => "Saliendo a las 7:00 am / Regresando a las 8:00 pm del siguiente día.",
            "include" => "Transporte, desayunos, una comida, tres talleres gastronómicos, casa de campaña.",
            "recomendacion" => "Llevar sleeping bag, sombrero/gorra, ropa cómoda."
        ],
        'viajes-secretos-mezcal' => [
            'titulo' => 'Los secretos del mezcal',
            'subtitulo' => 'Vida e historia del mezcal.',
            'imggal' => 'images/experiencias/img-gal-mezcal.png',
            'imgint' => 'images/experiencias/int-mezcal.png',
            "color" => '#5b7d00',
            "contenido" => "<p>Vive la experiencia de conocer el proceso de elaboración de una de las bebidas ancestrales con mayor reconocimiento a nivel mundial. Intérnate en los caminos de agaves silvestres, déjate guiar por un maestro mezcalero y degusta el elixir de los dioses mientras aprendes de su historia y tradición.</p>

                                <p>En este recorrido también podrás saborear la gastronomía oaxaqueña a través de exquisitos platillos preparados por una cocinera tradicional de Tlacolula de Matamoros.</p>",
            "duracion" => "Duración 6 horas.",
            "reservacion" => "Reserva en los teléfonos: (951) 351 1764 o (951) 351 1769.",
            "salida" => "Saliendo a las 8 am / Regresando a las 2 pm.",
            "include" => "Transporte, desayuno tradicional oaxaqueño, guía especializado y maestro mezcalero, taller, degustación de mezcal, recorrido por destilería, visita al Árbol del Tule.",
            "recomendacion" => "Llevar lentes de sol, sombrero/gorra, bloqueador solar, ropa cómoda."
        ],
        'viajes-delicias-zapotecas' => [
            'titulo' => 'DELICIAS ZAPOTECAS.',
            'subtitulo' => 'Oaxaca, historia con sabor.',
            'imggal' => 'images/experiencias/img-gal-delicias.png',
            'imgint' => 'images/experiencias/int-delicias.png',
            "color" => '#7c0022',
            "contenido" => "<p>Recorrer Monte Albán es una experiencia que tienes que vivir durante tu estancia en Oaxaca.</p>
                                <p>Saborea la deliciosa gastronomía oaxaqueña en la localidad de Zaachila visitando una fábrica de chocolate y conociendo el proceso de elaboración de esta bebida ancestral.</p>

                                <p>Tampoco te puedes perder el bello arte de alfarería en barro negro de San Bartolo Coyotepec. Juega con el barro y echa vuelo a tu imaginación creando tu propia pieza artesanal. </p>",
            "duracion" => "6 horas.",
            "reservacion" => "Reserva en los teléfonos: (951) 351 1764 o (951) 351 1769.",
            "salida" => "Saliendo a las 8 am / Regresando a las 2 pm.",
            "include" => "Transporte, desayuno tradicional oaxaqueño, taller de chocolate y de barro negro, entrada a Monte Albán.",
            "recomendacion" => "Llevar lentes de sol, sombrero/gorra, bloqueador solar, ropa cómoda y una dosis de creatividad."
        ],
        'viajes-hilos-y-fogones' => [
            'titulo' => 'HILOS Y FOGONES',
            'subtitulo' => 'Tejidos de historia y tradición…',
            'imggal' => 'images/experiencias/img-gal-hilos.png',
            'imgint' => 'images/experiencias/int-hilos.png',
            "color" => '#f0a10e',
            "contenido" => "<p>Atrévete a desafiar tu creatividad aprendiendo a bordar los tejidos únicos<br>plasmados en los huipiles de unas de las regiones más coloridas y antiguas de Oaxaca: <br>la Chinantla y la Mazateca.</p>

<p>Pon a prueba tus sentidos y descubre nuevos aromas y sabores en este recorrido que te invita a degustar de platillos endémicos como un delicioso caldo de piedra, la cochinita a la cubana o un delicioso café cosechado en las montañas tropicales de Oaxaca.</p>

<p>¡Una experiencia hecha totalmente para los amantes de los textiles y la moda étnica!</p>",
            "duracion" => "3 días, 2 noches.",
            "include" => "Hospedaje, dos desayunos, box lunch, kit de bienvenida, dos comidas.",
            "recomendacion" => "Llevar una blusa típica y tres mudas de ropa."
        ],
        'viajes-manos-magicas' => [
            'titulo' => 'Manos mágicas.',
            'subtitulo' => 'La belleza artesanal de Oaxaca.',
            'imggal' => 'images/experiencias/img-gal-manos.png',
            'imgint' => 'images/experiencias/int-manos.png',
            "color" => '#3d7ea8',
            "contenido" => "<p>Oaxaca es reconocido por sus artesanos; durante este recorrido visitaremos algunos de los
                poblados de Valles Centrales que se destacan por ser cuna de grandiosos artesanos.</p>

            <p>Iniciamos el recorrido degustando un delicioso desayuno oaxaqueño con productos endémicos de la región,
                continuaremos nuestro recorrido hasta llegar a San Martín Tilcajete, famoso por sus bellas piezas
                llamadas &#8220;alebrijes&#8221;, talladas en madera y pintadas a mano. ¡Te invitamos a pintar una y
                mostrar tu lado artístico!
            </p>

            <p>Continuamos el recorrido hacia San Bartolo Coyotepec, población conocida por su bello arte de alfarería
                en barro negro. Aquí también podrás crear tu propia pieza.</p>",
            "duracion" => "6 horas.",
            "reservacion" => "Reserva en los teléfonos: (951) 351 1764 o (951) 351 1769.",
            "salida" => "Saliendo a las 8 am / Regresando a las 2 pm.",
            "include" => "Transporte, guía, bebidas a bordo, acceso a talleres con artesanos y costo de las actividades
            con los mismos, desayuno tradicional oaxaqueño.",
            "recomendacion" => "Usar ropa cómoda y fresca, llevar lentes de sol, sombrero/gorra, bloqueador solar,
            llevar una dosis de ingenio y creatividad."
        ],
        'viajes-oaxaca-moda' => [
            'titulo' => 'OAXACA a la moda.',
            'subtitulo' => 'La tendencia de la tradición.',
            'imggal' => 'images/experiencias/img-gal-moda.png',
            'imgint' => 'images/experiencias/int-moda.png',
            "color" => '#8f175c',
            "contenido" => "<p>Si hablamos de textiles, Oaxaca es un estado que los representa con un estilo único. Ven
                y maravíllate con esta experiencia donde, a través de un show room exclusivo para ti, conocerás textiles
                y bordados 100% oaxaqueños así como las nuevas tendencias de la moda étnica: vestidos, huipiles,
                guayaberas, joyas y sombreros creados por diseñadores y manos oaxaqueñas.</p>

            <p>Disfruta, además, de un recorrido por un mercado tradicional, recolectando ingredientes endémicos de la
                cocina oaxaqueña para que posteriormente vivas la experiencia de cocinar al lado de un chef reconocido
                internacionalmente. ¡Descubre, crea y deléitate con los manjares que tú mismo prepararás!</p>",
            "duracion" => "10 horas.",
            "reservacion" => "Reserva en los teléfonos: (951) 351 1764 o (951) 351 1769.",
            "salida" => "Saliendo a las 8 am / Regresando a las 6 pm.",
            "include" => "Guía especializado, recorrido por mercado, taller gastronómico con chef (comida incluida),
            <i>show room</i> con diseñadora oaxaqueña.",
            "recomendacion" => "usar ropa cómoda y fresca."
        ],
        'viajes-entre-montaña-de-cafe' => [
            'titulo' => 'ENTRE MONTAÑAS DE CAFÉ',
            'subtitulo' => 'Aromas con sabor a Oaxaca',
            'imggal' => 'images/experiencias/img-gal-delicias.png',
            'imgint' => 'images/experiencias/int-cafe.png',
            "color" => '#816052',
            "contenido" => "<p>Visita Ejutla de Crespo; recorre su coloridas calles y prueba “la salchicha ejuteca, un
                ícono de los Valles Centrales.”</p>

            <p>Conoce el proceso de elaboración de los “sombreros de panza de burro” visitando a uno de los artesanos
                del municipio de Miahuatlán de Porfirio Díaz.</p>

            <p>Camina entre los cafetales de la Sierra Sur de Oaxaca mientras escuchas a uno de los grandes maestros del
                café de especialidad y aprende en una cata, a degustar un buen café.</p>",
            "duracion" => "3 días, 2 noches.",
            "include" => "Transportación, dos desayunos, dos comidas y una cena. Hospedaje en Mazunte, taller de
            salchicha ejuteca, cata de café, entradas a Finca Chelín y Centro Mexicano de la Tortuga.",
            "recomendacion" => "Llevar dos mudas de ropa, traje de baño, sombrero o gorra, lentes de sol, calzado
            antiderrapante o botas, ropa de frio, cámara de fotos, lámpara de mano, sleeping bag."
        ],
    ];
    public function getViaje($title)
    {
        //dd($title);
        $informacion = $this->_viajes[$title];
        return view('viajes.index', compact('informacion'));
    }
}
