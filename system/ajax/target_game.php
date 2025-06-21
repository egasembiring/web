<?php
require_once("../../mainconfig.php");

if (isset($_POST['category'])) {
	$post_cat = filter($_POST['category']);
	?>
	<?php if(in_array($post_cat, ['MOBILE LEGEND','TOM AND JERRY : CHASE','RAGNAROK M: ETERNAL LOVE'])) { ?>
	<div class="form-group">
        <label class="col-md-12 control-label">Server :</label>
        <div class="col-md-12">
            <input type="text" name="data2" id="data2" class="form-control">
        </div>
    </div>
    <?php } else if ($post_cat == 'LIFEAFTER CREDITS') { ?>
    <div class="form-group">
        <label class="col-md-12 control-label">Server :</label>
        <div class="col-md-12">
            <select class="form-control custom-select" name="data2" id="data2" required>
                <option value="">Pilih Server</option>
                <option value="MiskaTown">MiskaTown</option>
                <option value="SandCastle">SandCastle</option>
                <option value="MouthSwamp">MouthSwamp</option>
                <option value="RedwoodTown">RedwoodTown</option>
                <option value="Obelisk">Obelisk</option>
                <option value="FallForest">FallForest</option>
                <option value="MountSnow">MountSnow</option>
                <option value="NancyCity">NancyCity</option>
                <option value="CharlesTown">CharlesTown</option>
                <option value="SnowHighlands">SnowHighlands</option>
                <option value="Santopany">Santopany</option>
                <option value="LevinCity">LevinCity</option>
            </select>
        </div>
    </div>
    <?php } else if ($post_cat == 'KNIGHTS OF VALOUR') { ?>
    <div class="form-group">
        <label class="col-md-12 control-label">Server :</label>
        <div class="col-md-12">
            <select class="form-control custom-select" name="data2" id="data2" required>
                <option value="">Pilih Server</option>
                <option value="800090">Google Play</option>
                <option value="800092">App Store</option>
                <option value="800089">Huawei AppGallery</option>
                <option value="160856">Oppo App Market</option>
                <option value="160861">Vivo App Market</option>
                <option value="160860">Xiaomi App Market</option>
            </select>
        </div>
    </div>
    <?php } else if ($post_cat == 'SCROLL OF ONMYOJI') { ?>
    <div class="form-group">
        <label class="col-md-12 control-label">Server :</label>
        <div class="col-md-12">
            <select class="form-control custom-select" name="data2" id="data2" required>
                <option value="">Pilih Server</option>
                                            <option value="3">S1-Taman sakura</option>
                                            <option value="4">S2-Akademi Mitama/S3-Gunung roh</option>
                                            <option value="6">S4-Ketiadaan/S5-Kosong/S6-Stargate</option>
                                            <option value="9">S7-Realm Takdir/S8-Reruntuhan/S9-Kuil Cahaya</option>
                                            <option value="12">S10-Pavilion langit/S11-Taman impian/S12-Hutan diam</option>
                                            <option value="15">S13-Jalur Langit/S14-Pencarian Buluh/S15-Misteri Elf</option>
                                            <option value="18">S16-Hutan roh iblis/S17-Laut dalam/S18-Kuil Beruang</option>
                                            <option value="21">S19-Domain kegelapan/S20-Distorsi/S21-Kenshi</option>
                                            <option value="24">S22-Uzume/S23-Fujin/S24-Inari</option>
                                            <option value="27">S25-Shikoku/S26-Okami/S27-Nagi</option>
                                            <option value="30">S28-Kojiki/S29-Raijin/S30-Suijin</option>
                                            <option value="33">S31-Susanoo/S32-Orochi/S33-Tenjin</option>
                                            <option value="36">S34-Otohime/S35-Ame/S36-Kaguya</option>
                                            <option value="39">S37-Hana/S38-Kojin/S39-Mikoto</option>
                                            <option value="42">S40-Jizo/S41-Konoha/S42-Aizen</option>
                                            <option value="45">S43-Kannon/S44-Ebisu/S45-Danau berkabut</option>
                                            <option value="48">S46-Gunung monster/S47-Kota Bulan/S48-Hutan Ajaib</option>
                                            <option value="51">S49-Balai Bumi/S50-Oiwa/S51-Sazae Oni</option>
                                            <option value="54">S52-Yama Uba/S53-Hannya/S54-Namanari</option>
                                            <option value="57">S55-Ikiryo/S56-Chunari/S57-Honnari</option>
                                            <option value="60">S58-Ubume/S59-Nure Onna/S60-Nukekubi</option>
                                            <option value="63">S61-Rokurkubi/S62-Ubagabi/S63-Hone Onna</option>
                                            <option value="66">S64-Akashita/S65-Kiyohime/S66-Obake</option>
                                            <option value="69">S67-Kamaitaichi/S68-Kekkai</option>
                                            <option value="71">S69-Isonade/S70-Masakatsu</option>
                                            <option value="73">Yasumori/Mototsuna</option>
                                            <option value="75">Kagemori</option>
                                            <option value="76">Terukage</option>
                                            <option value="77">Mitsuhide</option>
                                            <option value="78">Nobutomo</option>
                                            <option value="79">Yoshihisa</option>
                                            <option value="80">Morinari</option>
                                            <option value="81">Shigetsuna</option>
                                            <option value="82">Yurei</option>
                                            <option value="83">Aokage</option>
                                            <option value="84">Muratsugu</option>
                                            <option value="85">Arima</option>
                                            <option value="86">Hisamasa</option>
                                            <option value="87">Nagaharu</option>
                                            <option value="88">Morichika</option>
                                            <option value="89">Shigezane</option>
                                            <option value="90">Masamune</option>
                                            <option value="91">Toshikatsu</option>
                                            <option value="92">S90-Fusahide</option>
                                            <option value="93">S91-Ujisato</option>
                                            <option value="94">S92-Naomasa</option>
                                            <option value="95">S93-Tsunenaga</option>
                                            <option value="96">S94-Hattori</option>
                                            <option value="97">S95-Hideharu</option>
                                            <option value="98">S96-Kennyo</option>
                                            <option value="99">S97-Masatoshi</option>
                                            <option value="100">S98-Tsuneoki</option>
                                            <option value="101">S99-Isshiki</option>
                                            <option value="102">S100-Imagawa</option>
                                            <option value="103">S101-Hiroie</option>
                                            <option value="104">S102-Yukinaga</option>
                                            <option value="105">S103-Hisamichi</option>
                                            <option value="106">S104-Matsudaira</option>
                                            <option value="107">S105-Hatobo</option>
                                            <option value="108">S106-Nageki</option>
                                            <option value="109">S107-Kappa</option>
                                            <option value="110">S108-Ryuo</option>
                                            <option value="111">S109-Nozuchi</option>
                                            <option value="112">S110-Yosei</option>
                                            <option value="113">S111-Ushirogami</option>
                                            <option value="114">S112-Tsurube</option>
                                            <option value="115">S113-Tsukuyomi</option>
                                            <option value="116">S114-Momonji</option>
                                            <option value="117">S115-Suzaku</option>
                                            <option value="118">S116-Seiryuu</option>
                                            <option value="119">S117-Byakko</option>
                                            <option value="120">S118-Genbu</option>
                                            <option value="121">S119-Shiryo</option>
                                            <option value="122">S120-Kahaku</option>
                                            <option value="123">S121-Rojinbi</option>
                                            <option value="124">S122-Onryo</option>
                                            <option value="125">S123-Kasha</option>
                                            <option value="126">S124-Tenko</option>
                                            <option value="127">S125-Nue</option>
                                            <option value="128">S126-Yuki-Onna</option>
                                            <option value="129">S127-Mononoke</option>
                                            <option value="130">S128-Okiku</option>
                                            <option value="131">S129-Kodama</option>
                                            <option value="132">S130-Issie</option>
                                            <option value="133">S131-Hakano</option>
                                            <option value="134">S132-Gyuki</option>
                                            <option value="135">S133-Funayurei</option>
                                            <option value="136">S134-Dodomeki</option>
                                            <option value="137">S135-Kosagi</option>
                                            <option value="138">S136-Kirin</option>
                                            <option value="139">S137-Amesu</option>
                                            <option value="140">S138-Akubozu</option>
                                            <option value="141">S139-Yuuki</option>
                                            <option value="142">S140-Supia</option>
                                            <option value="143">S141-Onisuzume</option>
                                            <option value="144">S142-Nyoromo</option>
                                            <option value="145">S143-Kishi</option>
                                            <option value="146">S144-Utsudon</option>
                                            <option value="147">S145-Nashi</option>
                                            <option value="148">S146-Myuu</option>
                                            <option value="149">S147-Kabuto</option>
                                            <option value="150">S148-Iibui</option>
                                            <option value="151">S149-Azumao</option>
                                            <option value="152">S150-Rakki</option>
                                            <option value="153">S151-Ebiwara</option>
                                            <option value="154">S152-Tama</option>
                                            <option value="155">S153-Jugon</option>
                                            <option value="156">S154-Koiru</option>
                                            <option value="157">S155-Gyaropu</option>
                                            <option value="158">S156-Uindie</option>
                                            <option value="159">S157-Soma</option>
                                            <option value="160">S158-Rokon</option>
                                            <option value="161">S159-Korata</option>
                                            <option value="162">S160-Catapi</option>
                                            <option value="163">S161-Suripu</option>
                                            <option value="164">S162-Hitokage</option>
            </select>
        </div>
    </div>
    <?php } else if ($post_cat == 'KNIGHTS OF VALOUR') { ?>
    <div class="form-group">
        <label class="col-md-12 control-label">Server :</label>
        <div class="col-md-12">
            <select class="form-control custom-select" name="data2" id="data2" required>
                <option value="">Pilih Server</option>
                <option value="800090">Google Play</option>
                <option value="800092">App Store</option>
                <option value="800089">Huawei AppGallery</option>
                <option value="160856">Oppo App Market</option>
                <option value="160861">Vivo App Market</option>
                <option value="160860">Xiaomi App Market</option>
            </select>
        </div>
    </div>
	<?php
    }
} else {
?>
<option value="0">Error.</option>
<?php
}