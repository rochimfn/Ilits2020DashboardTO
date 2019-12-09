<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Forda;
class FordaSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forda = [[43, 'FORDA SAMARINDA', 'samarinda', '-', '-', 'Muhammad Daffa R', '05211640000144', '082220687000', 'dapoy_', 'samain dulu', '082220687000', 'dapoy_'],
        [6, 'FOKUS ITS', 'Sumenep,madura', '@gbg3417n', 'fokusits', 'Muhammad Rickza Nuril Iskandar', '04211640000025', '087866119969', 'mz_rick', 'Nur Rafif Maulana', '083850131831', 'rafifmaulana26'],
        [7, 'ATLAS', 'Semarang', '-', '-', 'Hanggayu Aly Sabtiadi', '02511640000099', '081904403023', 'hangga_aly', 'Rafif Fairuza', '081901747804', 'rafifairuza'],
        [8, 'Keluarga Mahasiswa Tanah Daeng', 'Sulawesi Selatan', '@ihp7419b, @qnk4019n', '@kandaits, @esn.its', 'Ivandy Halim', '08211640000084', '081355559833', 'fandifnd', 'Fadhli Ismail Hatta', '081354520305', 'fadhliih'],
        [9, 'Lingkup Mahasiswa Sumatera Selatan', 'Palembang dan sekitarnya', '@anu0652m', 'limas_sby', 'Muhammad Ridho Adiputra', '04311740000053', '081958500976', 'ridho_adiputra', 'Muhammad Revindo Moza', '08154024071', 'revindomoza'],
        [41, 'IM KALBARS', 'Kalimantan Barat - Pontianak', '-', 'imkalbar', 'Syarif Vikri Yazid Asseggaf', '08111540000087', '085257572699', 'viryaz', 'Muhammad Afif Fadhlurrahman', '082215672375', 'afiffadhlurrahman'],
        [40, 'GROITS', 'Purwodadi-Grobogan', '-', '-', 'Zahrul Zizki Dinanto', '05111740000168', '08987548464', 'Zahrulz1', 'Alfayni Amrina Rosyada N.P.', '085737102069', 'alfayni32'],
        [39, 'Forum Bumi Anoa [FORBUNOA]', 'Sulawesi Tenggara', '-', '-', 'Isaal Febriansya', '09111640000116', '082299192626', 'isaal1998', 'Abdul Rahmat', '085398756762', 'abdulrahmat48'],
        [13, 'Forda baduy', 'Banten dan sekitarnya', 'Belum ada', '@forda_baduy', 'Nur huda yudi wijaya', '10211700000031', '085218386186', '@hudayudi05', 'Yudi', '085218386186', '@hudayudi05'],
        [14, 'FORMED', 'Medan', '-', '-', 'Edric livanrio', '02511840000049', '081260973279', 'edricklivanrio', 'Ricardo Fransiskus Karo-Karo', '082276126156', 'ricardofransiskuskk'],
        [15, 'PERHIMAK ITS', 'Kebumen', '-', 'perhimak.its', 'Falentin Tri Yulianto', '02311740000092', '085225462751', 'f2_fffzf', 'Jeryco Rahardian', '0895604017715', 'Jrahardn'],
        [16, 'BABALITS', 'Baikpapan', '-', '-', 'ahmad ramadhan', '02211840000065', '081350166862', 'ahmadr10', 'Miftahul Hadi', '085349314377', 'hadi2155'],
        [17, 'Bulungan-Surabaya', 'Jakarta Selatan', '-', '-', 'Muhammad Bondan Vitto Ramadhan', '06211840000086', '085954709811', 'bondanvitto2', 'Muhammad Bondan Vitto Ramadhan', '085954709811', 'bondanvitto2'],
        [18, 'BandITS [Bandung-ITS]', 'Bandung', '@ycj8660c', 'bandung.its', 'Bima Putra', '06211640000124', '081519559230', 'WhyAlwaysMe2', 'Abdillah Ramadian', '089665373416', 'rpiabdillah'],
        [19, 'IRITS BTR', 'Riau', '@wht7227v', 'iritsbtr', 'Arif Darma Althia', '05111740000182', '081230024143', 'arifda', 'Arialdi Almonda', '081261622370', 'arialdialmonda21'],
        [20, 'IMAKUSA', 'Kudus', '@iya7617t', '@imakusa_', 'Hisam Widi Prayoga', '05111740000026', '082399146886', 'cornetz', 'Rizqi Dzulkifli', '08989925275', 'rizqidzul'],
        [21, 'IKAMALA ITS', 'LAMONGAN', '-', '@ikamalaits', 'Moh. Azam Aufar Rizky', '10111710000083', '085890501103', 'azamaufar', 'Moh. Azam Aufar Rizky', '085890501103', 'azamaufar'],
        [22, 'Keluarga Mahasiswa Kota Batik ', 'Pekalongan-Batang', '-', '-', 'M. Alfisyahr Erza Dwiatma', '04311540000039', '085790698961', 'alfierza', 'M. Zidan Badruddin Yusuf', '082328792538', 'bernadetanadine'],
        [23, 'Keluarga Mahasiswa Klaten di S', 'Klaten', '@quo0106e', '@kmksurabaya', 'Akhfa Yogananda', '04111840000026', '085725462254', '@gudhegyk04', 'Akhfa Yogananda', '085725462254', '@gudhegyk04'],
        [24, 'IMABIS', 'Jambi', '-', '-', 'Adlizie Rifkianda M', '03111540000144', '082236666314', 'adlizierifkianda', 'Janes Pratama Sinaga', '0895414240741', 'janes.s01'],
        [25, 'ALUMNI BUDI MULIA SIANTAR SURABAYA', 'PEMATANGSIANTAR', '-', 'wereabiss_', 'Ayub Sianturi', '02111640000022', '082259445039', 'ayubsianturi', 'Ayub Sianturi', '082259445039', 'ayubsianturi'],
        [26, 'Kaporits ', 'Purworejo ', 'KaporITS ', 'arekaporits', 'Faiz Kurnia Rahman', '10511700000046', '082227417765', 'faizkurnia23', 'Garin Wisnu Mukti ', '085270047959', 'garinwisnumurti'],
        [27, 'Cirebon "kita ira"', 'Cirebon, Jawa Barat', '-', 'cirebonkitaira', 'Rafiedhia Abel', '02511740000024', '081230152772', 'Rafiedhiaabel', 'Muhammad Fahmi Adiman', '082127329223', 'adimanfahmi95'],
        [50, 'KMTC [keluarga Mahasiswa Tasikmalaya]', 'Tasikmalaya, Jawa Barat', '-', '-', 'Ridwan Taofiq Firdaus ', '02411640000103', '082216577984', 'Ridwantaofiq', 'Ridwan Taofiq Firdaus ', '082216577984', 'Ridwantaofiq'],
        [29, 'SOLITS', 'SOLO', '@fnf8628s', 'SOLITS', 'Diaz Batara Syarmadayu ', '07211740000017', '081226062366', 'diazstrike76', 'Zulaikha', '081236869145', '083147005659'],
        [30, 'Saburai Community', 'Lampung', '@mot4949n', 'saburai_community', 'Muhammad Andhika', '04211641000035', '082182700365', 'Mandhikaa12', 'M. Kevin Novrian', '083170951629', 'kevinnvrn'],
        [31, 'HIMASA JEMBER', 'JEMBER', '@xgh7849m', '@himasajember', 'WAHYULIANA DEWI', '08411640000002', '083847118231', 'wahyuliano', 'FERNALDO ADITYA', '081249605730', 'fernaldoaditya'],
        [32, 'IMaBITS', 'Bangkalan', '@fbb9912c', '@imabits_bkl', 'Budi Raharja', '10311700000006', '087850170735', '_raharjabudi', 'Iro Datus Soleha', '085231045429', 'irodatussoleha'],
        [33, 'LAKASI [Laskar Kalimantan Selatan ITS]', 'Kalimantan Selatan ', '@byi5578t', 'lakasits', 'Muhammad Fandy Ilhami', '08211640000074', '085754924191', '-', 'Nury Ahdiya Rif`ati', '081250169400', 'nuryahdiya'],
        [34, 'IKAMADIRI', 'Kediri', '-', '@ikamadiri_its', 'Dennis Chaniago Ramadhan', '04211640000067', '081330823117', 'chaniagodennis', 'Muhammad Naufal Rasyad', '085736586331', 'mnaufalrsyd'],
        [35, 'IMAKOBA', 'Kota Batu', '-', '-', 'Farhan Aji Mukti', '02211840000044', '085230915776', 'farhan293', 'Farhan Aji Mukti', '085230915776', 'farhan293'],
        [36, 'ITS Bersenyum', 'Temanggung', '-', '-', 'Galuh Ajeng P.', '06211540000130', '081542310239', 'galuhajengprabeswari', 'Antonius Yoma W.', '089648439328', 'luckyuntung1'],
        [37, 'JANGKAR PASURUAN', 'PASURUAN', '-', '-', 'Aqil Wira Sakti Adli', '04211740000013', '082334373437', 'aqilwira', 'Goldio Ihza', '085649444451', 'Goldionirvana'],
        [38, 'IMAGESITS', 'Gresik', '@mup3927z', 'Imagesits', 'Moh Faslil Fawaidi', '02311740000114', '082244687060', 'faslilf', 'Ahmad Wahyudi Firmansyah', '085731749789', 'frmsyhahmad'],
        [69, 'Forda jogja', 'Yogjakarta', '-', '-', 'Cleverza muhammad syah', '021117640000136', '083867886132', 'Cleverza1999', 'Pradenta wisnu', '082134382773', 'Pradentawa'],
        [46, 'FORMASTA Surabaya', 'Tulungagung', '-', 'independent_its', 'Aditya Galih Prawira', '03111740000061', '085852141360', 'xxxfactorxxx', 'Aditya Galih Prawira', '085852141360', 'xxxfactorxxx'],
        [47, 'LAROS ITS', 'BANYUWANGI', '@dks3446k', 'laros_its', 'MOHAMMAD IMRON', '02411740000047', '08383581214', 'imron_013', 'AMAL MULYA SETIAWAN', '082331659052', 'amalms196'],
        [48, 'Surabaya Family of Rain City', 'Bogor', '@gtp7101r', '@safary_bogor', 'Pradiza Naufal R', '04311740000087', '087874654721', 'Pradizanr', 'Pradiza Naufal R', '087874654721', 'Pradizanr'],
        [49, 'Forum Bocah Bojonegoro ITS PENS PPNS', 'Bojonegoro', '-', 'forbbits', 'Muhammad Fathmi Rajzi Kuncoro', '04311740000072', '085728776588', 'fahmirajzi', 'Prisma Riashuda Prakosa', '082229448083', 'prismahuda'],
        [51, 'FORDA ITS BEKASI ', 'Bekasi', '-', '-', 'Felix Sagala', '04411840000049', '082216342638', 'felixsagala    ', 'Matthew Bramasta', '082299228507', 'bramastapr '],
        [52, 'Ikemas surabaya', 'Sukoharjo', '@lha3494j', 'Ikemas_sby', 'Bintang pratama', '07111740000009', '081227033630', '_bintangpratama', 'Zulfikar syaifudin H.B', '085880587933', 'zul230599'],
        [53, 'IKARSID', 'Sidoarjo, Jawa Timur', '-', '-', 'Mohammad Daffa Rizqi Siddieq', '02511840000114', '082131755593', 'daffarizqi2', 'Mohammad Daffa Rizqi Siddieq', '082264942941', 'xbiufx'],
        [54, 'ITS Magelang Community', 'Magelang', '-', '-', 'Akhmad Reinaldy Kurniawan', '04211740000039', '085290314260', 'reinaldyyk', 'Wijaya Sakti', '085868682936', 'wiwid_wijaya'],
        [55, 'Forsmawi ', 'Ngawi', '-', 'Forsmawisurabaya', 'Rendy Vredi Ristanto', '04211640000070', '085604304822', 'rendyvredi9', 'Rendy &amp; Ardiansyah', '085604304822', 'rendyvredi9'],
        [56, 'Forkamp', 'Pamekasan', '-', 'Forkamp_pmk', 'Wahyu Eko Setiawan', '10111610000052', '081231945135', 'wahyu_rd01', 'Haura Adena Kamisywara', '081259793066', 'adenahau'],
        [57, 'Rumah Rotan', 'Tuban, Jawa Timur', '@yfo9343u', 'rumahrotan3', 'Tito Bingar Saputra', '1310161034', '085707225887', 'titobs54', 'Muhammad Husnir Rahman', '081330262447', 'mhusnir'],
        [58, 'ITS Ponorogo', 'Ponorogo', '-', '-', 'Srie Harnanda', '03111840000142', '082221615075', 'srieharnanda', 'Srie Harnanda', '082221615075', 'srieharnanda'],
        [59, 'Barikade ', 'Kota Depok', '-', '-', 'Natrya nadibumi', '08211740000077', '087887166996', '@natryananang', 'Raden Panji Brama', '082112459690', '@bramsur'],
        [60, 'FORBM', 'Bima', '-', '-', 'Syaharussajali ', '02311740000084', '081237182946', 'Irul_sj', 'Ahmad syauqi', '6282340788686', '082340788686'],
        [76, 'FORDA BONTANG', 'BONTANG', '-', '-', 'Jesly Theonof Andi Lolo Sitoru', '02111840000145', '08115499144', 'Jeslyt', 'Qais F. Azhar', '082251186160', '-'],
        [68, 'ITS PROBOLINGGO', 'Probolinggo', '-', '-', 'Muchammad Insan Kamil', '04211640000008', '085234555103', 'kamilun6', 'Ahlur Roi Novanto Gumilang', '082147390633', 'ahlur11'],
        [66, 'Ikatan Mahasiswa Jakarta', 'DKI Jakarta', '-', '-', 'Oliver Khrisna Ramadhany', '04111841003042', '085781147344', 'oliverkr11', 'Oliver Khrisna Ramadhany', '081807983044', 'ezra.brian'],
        [65, 'Kemass ITS', 'Situbondo', '@dnx2593h', 'Kemass_its', 'Bintang Permana', '08211740000082', '6282143423297', 'Bintang_permana7', 'Devani dwi rachmarena', '0852340525418', 'Devanidwir'],
        [70, 'IMM ITS', 'Mojokerto', '@day1303f', '@immi_its', 'Alvin Rahmad Widyanto', '01211640000038', '082132779933', '@alvin_widiyanto', 'Alvin Rahmad Widyanto', '082132779933', '@alvin_widiyanto'],
        [71, 'IMPLISIT', 'Lombok ', '-', 'Implisit_its', 'Muhammad Ashobta Azry', '02311640000107', '081237491827', 'ashobta', 'Muhammad Anis Raihan', '087765459680', 'iananala'],
        [72, 'PMKTR', 'Aceh', '@mlv6768j', '@pmktr', 'Muarif', '03111640000060', '085214101608', 'muarif100316', 'Raihan Akbar Ghifari', '085270203025', 'rayakbargf'],
        [73, 'Gerakan Generasi Samawa', 'Sumbawa', '-', 'Gerakan Generasi Samawa', 'Wahyu Prayuda', '03211740000057', '081916822882', 'yu_prayudaa', 'Marwah Rizki Rahmatia', '082340041739', 'marwahtiaa'],
        [74, 'IMBS', 'Bondowoso, Jawa Timur', '-', '@imbsby', 'Aldy Andana Haris', '04211640000064', '085335403860', 'aldyandanah', 'Anita Catur Wahyuni', '082245564717', 'anita_catur03'],
        [75, 'Formabaya ITS', 'Blitar Raya', '@hwf5111a', '-', 'Robby Hartadi', '07211640000028', '085649399103', 'robbyhartadi', 'Alif Muftihan Rizaq', '082228244188', 'maharanisintan'],
        [77, 'MBP', 'Sumatera Utara', '-', '-', 'Matatatias Situmorang', '071150000025', '082298294883', 'Matatatias Situmorang', 'Simon Peres Pakpahan', '082298294883', 'Fransistose'],
        [79, 'IKMP [Ikatan Keluarga Mahasiswa Patu]', 'Patu', '-', '-', 'Bagas Ananda', '07111740000002', '082213883596', 'letkolbananda', 'Dita Witdyaningtyas', '081225880732', 'ditawitdya'],
        [80, 'IMAMI SURABAYA', 'SUMATERA BARAT', '@ldm3999c', '@imami_sby', 'ADRIAN FIKTA NUGRAHA', '02411640000084', '082174670315', '@adrianfikta', 'Hidayattul Rafli', '08893026951', 'Hdyt.rfli'],
        [81, 'IMAKA SURABAYA', 'KARANGANYAR', '@awt4544l', 'imakasurabaya', 'Hamid Yusuf', '07111640000024', '081334149648', '@hamidyusuf18', 'Alreza RF', '085802710182', 'alrezarf'],
        [82, 'IMJ [Ikatan Mahasiswa Jombang]', 'Jombang', '-', 'imj.its', 'Irwansyah', '10111710000035', '082257540502', 'Irwans990', 'Alif Azizia Putri M', '085748559926', 'Alifaziziaa'],
        [84, 'FORMAS ITS PENS PPNS', 'Sampang, Madura', '@kro8921s', 'formassampang_', 'Fahmi Aulia Rahman', '10211600000088', '082301711211', 'fahmixp4z', 'Andiyana Ilham Wahyudi', '083850184601', 'andiyanaw'],
        [85, 'FKMT ', 'Trenggalek ', '-', 'fkmt_trenggalek', 'Wildan Alfa Rahman ', '02111740000053', '089663306387', 'Alfawildan', 'Wildan Alfa Rahman ', '089663306387', 'Alfawildan'],
        [86, 'PLAT G', 'Tegal', '-', '-', 'Tengku Rafli R', '07111740000091', '085742125107', 'tengku030899', 'Lukmanul Hakim', '081567635983', 'lukmansora'],
        [87, 'Banyumas ITS', 'Banyumas', '-', '-', 'Titius Kamajaya', '04111640000089', '085743265835', 'titiusk', 'Titius Kamajaya', '085743265835', 'titiusk'],
        [88, 'CEPITS', 'Cepu', '-', '-', 'Devian Bayu Prakoso', '10311700000043', '087856405452', 'devianbayuprakoso_', 'Devian Bayu Prakoso', '08991932139', 'kukuh.setya'],
        [89, 'Argabayu', 'Nganjuk', '@k     hm0031b', 'argabayuofficial', 'dwi santoso', '02211740000034', '085331724191', 'dwisantoso7', 'Fitria', '085731244226', '085731244226']
    ];
    $x=1;
    foreach($forda as $data){
        User::create([
            'role'=>'forda',
            'username'=>'forda'.$x,
            'password'=>Hash::make('passwordasdefg')
        ]);
        $user = User::orderBy('id','desc')->first();
        Forda::create([
            'nama'=>$data[1],
            'daerah'=>$data[2],
            'id_line'=>$data[3],
            'uname_ig'=>$data[4],
            'nama_ketua'=>$data[5],
            'nrp'=>$data[6],
            'hp_ketua'=>$data[7],
            'id_line_ketua'=>$data[8],
            'nama_perwakilan'=>$data[9],
            'hp_perwakilan'=>$data[10],
            'id_line_perwakilan'=>$data[11],
            'user_id'=>$user->id
        ]);
        $x++;
    }
    }
}
