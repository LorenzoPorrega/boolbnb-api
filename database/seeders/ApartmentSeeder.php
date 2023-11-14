<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartmentsTest = [
            [
                'title' => "Elegant Barberini Suite",
                'slug' => 'elegant-barberini-suite',
                'user_id' => "1",
                'address' => '"Via Solferino, 00185 Roma"',
                'price' => '92',
                'images' => ["apartments\/6553a531b1590.webp","apartments\/6553a53212222.webp","apartments\/6553a53212fc4.webp","apartments\/6553a5321370a.webp","apartments\/6553a53213a3c.webp"],
                'description' => "Benvenuti  a Roma,  l'appartamento è perfetto per gruppi fino a 6 persone. Questo luminoso e moderno alloggio offre 2 camere da letto, 2 bagni, una cucina completamente attrezzata, un salone accogliente e un comodo divano letto. Situato a due passi dal centro storico, vi permette di esplorare comodamente le meraviglie della città. 
                Il nostro appartamento è la scelta ideale per una visita indimenticabile a Roma. Prenotate ora per vivere un'esperienza straordinaria!", 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '1',
                'visibility' => '1',
                'square_meters' => '68',
                'longitude' => '12.50148100',
                'latitude' =>'41.90377200'
            ],
            [
                'title' => "A casa di Pelé",
                'slug' => 'a-casa-di-pele',
                'user_id' => "2",
                'address' => 'Via Giovanni Battista Morgagni, 00161 Roma',
                'price' => '82',
                'images' => ["apartments\/6553a5b68ff5c.webp","apartments\/6553a5b69314d.webp","apartments\/6553a5b693903.webp"],
                'description' => "La stanza gode di un'ottima luminosità grazie alle vetrate che la circondano mentre, al suo interno, è stata arricchita con confort necessari quali televisione e aria condizionata. L'appartamento, all'interno del quale è sita la stanza, è composto anche da una suite con vasca idromassaggio (che troverete su airbnb ricercando 'a casa di Pelè suite', nonché un'ulteriore stanza per un totale di 6 persone da poter ospitare.", 
                'rooms_num' => '3',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '0',
                'square_meters' => '37',
                'longitude' => '12.51069900',
                'latitude' =>'41.90991800'
            ],
            [
                'title' => "Alis Laura guest house",
                'slug' => 'alis-laura-guest-house',
                'user_id' => "2",
                'address' => "Via Arezzo, 00161 Roma",
                'price' => '153',
                'images' => ["apartments\/6553a63311cef.jpg","apartments\/6553a63314387.jpg","apartments\/6553a633146ca.jpg","apartments\/6553a63314b56.webp","apartments\/6553a63314ed8.jpg"],
                'description' => "Alis Laura, located in Via Arezzo 49 in the Piazza Bologna district, a strategic area that allows you to reach any part of Rome in just a few minutes, will offer you an unforgettable stay in the Eternal City! The short distance (200m) from the Piazza Bologna Metro station (line B) and the Tiburtina metro and train station makes the structure well connected to the historic center and the rest of the city.", 
                'rooms_num' => '3',
                'beds_num' => '3',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '49',
                'longitude' => '12.51851200',
                'latitude' =>'41.91132300'
            ],
            [
                'title' => "Bea's Guesthouse-Junior suite Teresa n 5",
                'slug' => 'beas-guesthouse-junior-suite-teresa-n-5',
                'user_id' => "1",
                'address' => 'Via Vincenzo Forcella, 00161 Roma',
                'price' => '85',
                'images' => ["apartments\/6553a69004212.jpg","apartments\/6553a69005fe2.webp","apartments\/6553a69006411.jpg","apartments\/6553a69006f31.jpg","apartments\/6553a69007ba8.webp"],
                'description' => "Bea's Guesthouse è una struttura nuovissima. Posizione strategica: lontani dal caos ma a due passi da tutto nel quartiere Bologna/ Nomentano. A 200 metri dal Parco Merguerite Duras, i giardini di Villa Torlonia, la fermata metro di Piazza Bologna, stazione taxi, Policlinico e città Universitaria.Pulizia comodità ed eleganza sono le caratteristiche delle camere dotate di bagno privato esclusivo,Tv 55',Wi-Fi,aria condizionata, set di cortesia di prodotti da bagno, materassi air feel memory.", 
                'rooms_num' => '4',
                'beds_num' => '3',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '57',
                'longitude' => '12.51958900',
                'latitude' =>'41.91529600'
            ],
            [
                'title' => "Agnello Escape",
                'slug' => 'agnello-escape',
                'user_id' => "2",
                'address' => 'Via Ugo Foscolo, Milano',
                'price' => '753',
                'images' => ["apartments\/6553a8075e92e.webp","apartments\/6553a8076097a.webp","apartments\/6553a80762ed8.webp","apartments\/6553a80763220.webp","apartments\/6553a807635fb.webp"],
                'description' => "Lussuoso appartamento in caratteristico e signorile edificio vecchia Milano a pochi passi dal Duomo.", 
                'rooms_num' => '4',
                'beds_num' => '4',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '65',
                'longitude' => '8.78743300',
                'latitude' =>'45.57913900'
            ],
            [
                'title' => "YouHosty - Borgonuovo 3",
                'slug' => 'youhosty-borgonuovo-3',
                'user_id' => "2",
                'address' => 'Casa Via Borgonuovo 3, Via Borgonuovo 3, 20121 Milano',
                'price' => '25',
                'images' => ["apartments\/6553a87ad5213.webp","apartments\/6553a87ad6e61.webp","apartments\/6553a87ad736b.webp","apartments\/6553a87ad847c.webp","apartments\/6553a87ad892c.webp"],
                'description' => "Incantevole bilocale situato nel cuore di Milano, tra il Quadrilatero della Moda e il quartiere Brera. L’appartamento è composto da soggiorno con divano letto e angolo cottura, camera da letto e bagno. Tutto recentemente ristrutturato. Un vero gioiello!", 
                'rooms_num' => '1',
                'beds_num' => '1',
                'bathroom_num' => '1',
                'visibility' => '0',
                'square_meters' => '34',
                'longitude' => '9.19160900',
                'latitude' =>'45.47046300'
            ],
            [
                'title' => "Da Me Milano # Skyline View - Balcony",
                'slug' => 'da-me-milano-skyline-view-balcony',
                'user_id' => "2",
                'address' => 'Piazza della Repubblica, 20121, 20124 Milano',
                'price' => '900',
                'images' => ["apartments\/6553a8c2d0cd7.webp","apartments\/6553a8c2d3329.webp","apartments\/6553a8c2d5b2d.webp","apartments\/6553a8c2d6f8e.webp","apartments\/6553a8c2d878e.webp"],
                'description' => 'This unique place has a style all its own.
                The flat is situated between Brera and the garden "Porta Venezia“ . In 5 minutes walk you can go shopping in the fashion area of Monte Napoleone .
                Your hosts is traveling a lot for work and uses the flat as a southern pied-a-terre. She a international working garden designer , so when she is not relaxing at home, she is scouting the Milan scene for the next big thing.', 
                'rooms_num' => '1',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '63',
                'longitude' => '9.19721000',
                'latitude' =>'45.47896100'
            ],
            [
                'title' => "Bright Green room 4min to Metro",
                'slug' => 'bright-green-room-4min-to-metro',
                'user_id' => "1",
                'address' => 'Via Emanuele Muzio, 20124 Milano',
                'price' => '62',
                'images' => ["apartments\/6553a91b8a93c.webp","apartments\/6553a91b8c7d2.webp","apartments\/6553a91b8cadb.webp","apartments\/6553a91b8e18f.webp","apartments\/6553a91b8e908.webp"],
                'description' => 'Bright private room on first floor of a private villa located in a very elegant and quiet district of Milan, very well served by public transport. 4 mins walk from the Metro, 12 mins walk from Milan central railway station.
                This room has a comfortable double bed, with private bathroom in the next door.', 
                'rooms_num' => '2',
                'beds_num' => '1',
                'bathroom_num' => '2',
                'visibility' => '0',
                'square_meters' => '33',
                'longitude' => '9.20043800',
                'latitude' =>'45.49081000'
            ],
            [
                'title' => "Il Mosaico Family Apartments Appartamento",
                'slug' => 'il-mosaico-family-apartments-appartamento',
                'user_id' => "1",
                'address' => "Corso Vittorio Veneto, 91026 Mazara del Vallo (Strada Provinciale 38)",
                'price' => '43',
                'images' => ["apartments\/6553a9e96fef2.webp","apartments\/6553a9e972416.webp","apartments\/6553a9e97295f.webp","apartments\/6553a9e972fba.webp","apartments\/6553a9e97330e.webp"],
                'description' => "Appartamento luminosissimo con balconi che si affacciano su una delle vie più importanti e centrali della città (Corso Vittorio Veneto). Composto da una zona giorno arredata in stile rinascimentale con ampia cucina attrezzata, tavolo e sedie. Zona giorno con vista panoramica. 2 Camere da letto, 1 bagno con doccia e lavatrice. Appartamento climatizzato.", 
                'rooms_num' => '3',
                'beds_num' => '2',
                'bathroom_num' => '1',
                'visibility' => '1',
                'square_meters' => '44',
                'longitude' => '12.59097700',
                'latitude' =>'37.65463500'
            ],
            [
                'title' => "Appartamento Meli",
                'slug' => 'appartamento-meli',
                'user_id' => "2",
                'address' => "Via Monsignor Graffeo, 91026 Mazara del Vallo",
                'price' => '43',
                'images' => ["apartments\/6553aa2ce86f8.webp","apartments\/6553aa2cea2b0.webp","apartments\/6553aa2cea77c.jpg","apartments\/6553aa2ceab77.webp","apartments\/6553aa2ceafae.webp"],
                'description' => "Disponibile per affitti brevi, vacanze, un comodissimo e da poco ristrutturato appartamento in centro: vicino alle principali piazze di Mazara, al centro storico, al lungomare, alla spiaggia in città e al Satiro. Due camere da letto (fino a 5 posti letto), comodo bagno, cucina soggiorno spazioso e ripostiglio lavanderia. Completamente autonomo, arredato e completo di tutti gli utensili da cucina e biancheria per letto e bagno.", 
                'rooms_num' => '3',
                'beds_num' => '2',
                'bathroom_num' => '3',
                'visibility' => '1',
                'square_meters' => '35',
                'longitude' => '12.59305900',
                'latitude' =>'37.65107400'
            ],
            [
                'title' => "{beach-house } Villa Mare Fuori - On the sea",
                'slug' => 'beach-house-villa-mare-fuori-on-the-sea',
                'user_id' => "2",
                'address' => "Lungomare San Vito, 91026 Mazara del Vallo",
                'price' => '144',
                'images' => ["apartments\/6553aa71c0cd8.webp","apartments\/6553aa71c2c34.webp","apartments\/6553aa71c2fd6.webp","apartments\/6553aa71c346d.webp","apartments\/6553aa71c3993.webp"],
                'description' => "La posizione ideale della casa, a soli 5 minuti dal centro di Mazara del Vallo, ti consente di godere della vita cittadina e dell'atmosfera vivace, mentre la sua posizione di fronte alla spiaggia di Lungomare San Vito ti offre accesso immediato alle dolci onde e alla sabbia dorata. Il grande giardino circostante è un paradiso per gli amanti della natura, con tanto spazio per rilassarsi, organizzare attività all'aperto e godere di indimenticabili tramonti sul mare.", 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '54',
                'longitude' => '12.60368200',
                'latitude' =>'37.64270700'
            ],
            [
                'title' => "Villa fronte mare vicino il centro",
                'slug' => 'villa-fronte-mare-vicino-il-centro',
                'user_id' => "1",
                'address' => "Corso Vittorio Veneto 38, 91026 Mazara del Vallo",
                'price' => '127',
                'images' => ["apartments\/6553aab598e67.webp","apartments\/6553aab59ae6e.webp","apartments\/6553aab59b321.webp","apartments\/6553aab59b83d.webp","apartments\/6553aab59bc73.webp"],
                'description' => "Villa fronte mare  con vialetto su due livelli con 3 appartamenti ingressi indipendenti la struttura  è a piano terra della villa è fornita di doccia esterna e spazio per barbecue ampio spazio verde con prato inglese terrazza sul mare e zona relax con solarium", 
                'rooms_num' => '3',
                'beds_num' => '3',
                'bathroom_num' => '1',
                'visibility' => '1',
                'square_meters' => '75',
                'longitude' => '12.59321600', 
                'latitude' =>'37.65357800'
            ],
            ];

            foreach($apartmentsTest as $singleAp) {
                Apartment::create([
                    'title' => $singleAp['title'],
                    'slug' => $singleAp['slug'],
                    'user_id' => $singleAp['user_id'],
                    'address' => $singleAp['address'],
                    'price' => $singleAp['price'],
                    'images' => $singleAp['images'],
                    'description' => $singleAp['description'],
                    'rooms_num' => $singleAp['rooms_num'],
                    'beds_num' => $singleAp['beds_num'],
                    'bathroom_num' => $singleAp['bathroom_num'],
                    'visibility' => $singleAp['visibility'],
                    'square_meters' => $singleAp['square_meters'],
                    'longitude' => $singleAp['longitude'],
                    'latitude' =>$singleAp['latitude']
                ]);
            }

    }
}
