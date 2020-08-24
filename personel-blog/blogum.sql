-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2016, 21:05:06
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `blogum`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adi` varchar(222) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yasi` varchar(222) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `meslegi` varchar(222) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(222) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`adi`, `yasi`, `meslegi`, `aciklama`) VALUES
('Koray Güler', '18', 'Bilgisayar Mühendisliği', 'Bu blogda php,html,java dersleri vererek beraber öğrenip beraber yapacağız. ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale`
--

CREATE TABLE IF NOT EXISTS `makale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `makale`
--

INSERT INTO `makale` (`id`, `baslik`, `icerik`, `aciklama`, `yazar`, `tarih`) VALUES
(7, 'PHP NEDİR ?', '¶ PHP (açılımı PHP: Hypertext Preprocessor) geniş bir kitle tarafından kullanılan, özellikle sanal yöreler üzerinde geliştirme için tasarlanmış HTML içine gömülebilen bir betik dilidir. Bir PHP betiğinin Perl ya da C gibi dillerden ne kadar farklı bir yapıda olduğuna dikkat edin.', '¶ PHP (açılımı PHP: Hypertext Preprocessor) geniş bir kitle tarafından kullanılan, özellikle sanal yöreler üzerinde geliştirme için tasarlanmış HTML içine gömülebilen bir betik dilidir. Bir PHP betiğinin Perl ya da C gibi dillerden ne kadar farklı bir yap', 'admin', '0000-00-00'),
(8, 'HTML NEDİR ?', 'HTML, bir programlama dili olarak tanımlanamaz. Zira HTML kodlarıyla kendi başına çalışan bir program yazılamaz. Ancak bu dili yorumlayabilen programlar aracılığıyla çalışabilen programlar yazılabilir. Programlama dili denilememesinin nedeni tam olarak budur. Temel gereği yazı, görüntü, video gibi değişik verileri ve bunları içeren sayfaları birbirine basitçe bağlamak, buna ek olarak söz konusu sayfaların web tarayıcısı yazılımları tarafından düzgün olarak görüntülenmesi için gerekli kuralları belirlemektir. HTML kodunu web tarayıcıları okur, yorumlar ve görsel hale dönüştürürler, dolayısıyla aynı HTML kodunun farklı tarayıcılarda farklı sonuç vermesi olasıdır. CSS ve JavaScript ile beraber kullanıldığında HTML vasıtasıyla görsel ve dinamik web siteleri yaratılabilir.\r\n\r\nKüçüktür ve büyüktür işaretleri arasına yazılan HTML komutları kullanılarak yazılır (ör: <html>). İşaretlenen metnin başını ve sonunu belirtmek için çoğunlukla çift olarak kullanılırlar (Örnek: <h1>Selam</h1>) ancak işaretlemek yerine metnin bir yerine bir işaret konacaksa tek olarak da kullanılabilirler (Ör: <img>).', 'HTML, bir programlama dili olarak tanımlanamaz. Zira HTML kodlarıyla kendi başına çalışan bir program yazılamaz. Ancak bu dili yorumlayabilen programlar aracılığıyla çalışabilen programlar yazılabilir.', 'admin', '0000-00-00'),
(9, 'CSS NEDİR?', 'HTML bize metin biçimlendirme alanında çok geniş olanaklar sunar. CSS, uzun yazılışıyla Cascading Style Sheets, veya Türkçesiyle Stil şablonları ise bunu bir adım daha öteye götürür, bize sayfalarımız için global şablonlar hazırlama olanağı verdiği gibi, tek bir harfin stilini; yani renk,  font, büyüklük gibi özelliklerini değiştirmek için de kullanılabilir. Bu tekniğin en önemli özelliği kullanımındaki bu esnekliğidir.\r\nBir web sayfası içerisinde zaten estetik kuralları gereği yüzlerce renk ve font kullanmayız. Genelde birbiriyle uyumlu birkaç renk ve birkaç font kullanırız ki, bunları her sayfada ayrı ayrı tekrar belirtmek yerine CSS yardımıyla bir sefer tanımlayıp bütün web sayfamızda kullanabiliriz.Bu şekilde güncelleme yaparken de onlarca sayfayı değiştirmekten kurtuluruz.\r\nCSS kodları HTML kodlarının içine yazılırlar. Türüne göre body veya head bölümlerinde yer alabilirler. Bunların dışında harici CSS dosyaları oluşturulup bunlar gerektiğinde HTML belgesi içerisinde çağırılabilirler.\r\nHemen hemen her konuda olduğu gibi CSS konusunda da Microsoft Internet Explorer ve Netscape farklı yorumlar ortaya koyarlar. Bu noktada her iki browser''ın da aynı/benzer yorumlayacağı kodlar yazmak en uygunudur.', 'HTML bize metin biçimlendirme alanında çok geniş olanaklar sunar. CSS, uzun yazılışıyla Cascading Style Sheets, veya Türkçesiyle Stil şablonları ise bunu bir adım daha öteye götürür, bize sayfalarımız için global şablonlar hazırlama olanağı verdiği gibi, ', 'admin', '0000-00-00'),
(10, 'ASP.NET NEDİR ?', ' Microsoft’un geliştirdiği, .Net Framework üzerine çalışan web uygulama dilidir. Asp.Net sayesinde web programcıları kolaylıkla dinamik web siteleri, web uygulamaları veya XML web servislerini geliştirebilir.\r\n      .Net Nedir ?\r\n      .NET Framework, Microsoft tarafından geliştirilen, Windows tabanlı uygulama geliştirmek için bu platformu kullanarak farklı programlama dillerinin birlikte çalışabileceği ortak bir geliştirme ortamıdır. Bu platform yazılım geliştirme ve yazılımı derleme için gereklidir. Net platformu, işletim sisteminden ve donanımdan daha üst seviyede verim alabilmek için tasarlanmıştır. Bu serinin ilk ürünleri Windows Server 2003 ve Visual Studio 2003 ‘dür', ' Microsoft’un geliştirdiği, .Net Framework üzerine çalışan web uygulama dilidir. Asp.Net sayesinde web programcıları kolaylıkla dinamik web siteleri, web uygulamaları veya XML web servislerini geliştirebilir.', 'admin', '0000-00-00'),
(11, 'JAVASCRİPT NEDİR ?', 'JavaScript, sunucu ve istemci uygulamaları için Netscape''in geliştirdiği, farklı platformlarda çalışabilen, nesne tabanlı bir lisandır. JavaScript ufak ve sade bir lisandır. Herhangi bir sistem lisanı kadar yetenekli olmasa da internet tarayıcılarında HTML içine ve uygulamalara kolayca eklenip sayfaya dinamizm kazandırması için tasarlanmıştır.\r\n\r\nJavaScript’i anlamak için HTML’in bilinmesi ön şarttır. HTML ile hazırlanan sayfalar, üzerinde hiçbir işlem yapılmadan ziyaretçiye/istemciye olduğu gibi gönderilir. Ziyaretçinin bilgisayarındaki tarayıcı (browser) bu HTML kodlarını sunucudan aldıktan sonra görüntülenecek biçimde yorumlayarak gösterir. Fakat, tasarlanan bu HTML sayfada günün tarihi gösterilmek istendiğinde doğru tarihi göstermek için tek çözüm her gece sayfanın HTML kodlarının güncellenmesi olacaktı… Peki, her saniye değişen aktif bir saat gösterilmek istendiğinde ne olacaktı?!\r\n\r\nTanımında da belirtildiği gibi JavaScript sayfaya dinamizm kazandırarak tarih ve saat gösterme işlemlerini gerçekleştirebilir. Bunun yanında fare tıklaması ve form girişi gibi kullanıcı olaylarına cevap verebilir. Örneğin, bir HTML formunda istenen posta kodunun veya E-Posta adresinin geçerliliğini kontrol etmek için bir fonksiyon yazılarak sunucu ile herhangi bir bağlantı kurulmadan giriş geçerliliği kontrol edilip uyarı mesajı gösterilebilir.', 'JavaScript, sunucu ve istemci uygulamaları için Netscape''in geliştirdiği, farklı platformlarda çalışabilen, nesne tabanlı bir lisandır. JavaScript ufak ve sade bir lisandır. Herhangi bir sistem lisanı kadar yetenekli olmasa da internet tarayıcılarında HTM', 'admin', '0000-00-00'),
(12, 'AJAX NEDİR ?', 'Ajax programlama dili bir çok web yazılım dilinin aksine dinamik çalışan bir web programlama dilidir. “Asynchronous JavaScript and XML” kelimelerinin kısalması olan ajax bir çok web programlama dili ile çalışır. Peki ama Ajax Nedir? Amaç olarak bütün sayfayı kullanıcıya tekrar yükletmeden, gerekli olan kısımları dinamik olarak sayfayı yenilemeden ekrana getirmek veya servera göndermek. Örneğin iletişim formu doldurulduğunda sadece iletişim formunu göndererek sayfaya sonucu yazdırmak için kullanılabilir.\r\n\r\nAjax hemen hemen her web projesinde kullanılabilir ancak desteklemeyen tarayıcılar içinde bir versiyon oluşturulması gerekir. Gelişmiş arama motorları ajax içeriğini okuyabilirken bazıları kaynak kodlarında gözükmeyen bu içeriği okuyamaz.\r\n\r\nSadece istenen kısmın yüklenmesi hız açısından bir avantajken, kodların kullanıcı bilgisayarı tarafından yorumlanması sebebiyle yavaş bilgisayarlar sorun yaşamaktadır. Ajaxı kullanmak ana web programlarının yanı sıra iyi bir javascript bilgisi gerektirmektedir.\r\n\r\nAjax yapısı sizi bir çok kod satırından kurtarabilirken bazı işlerde daha çok kod yazılması gerekebilir. Yapılan işlerde neyin gerekli olduğuna dikkat edilmesi gerekmektedir.', 'Ajax programlama dili bir çok web yazılım dilinin aksine dinamik çalışan bir web programlama dilidir. “Asynchronous JavaScript and XML” kelimelerinin kısalması olan ajax bir çok web programlama dili ile çalışır. Peki ama Ajax Nedir? Amaç olarak bütün sayf', 'admin', '0000-00-00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad`, `sifre`) VALUES
(1, 'admin', 'admin'),
(2, 'ahmet', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
