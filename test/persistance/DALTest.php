<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-12-16 at 14:33:53.
 */
require_once '/../../persistance/DAL.php';
require_once '/../../persistance/BaseDeDonnee.php';
require_once '/../../metiers/ArticleWeb.php';
require_once '/../../metiers/FluxRSS.php';
require_once '/../../metiers/Hote.php';
class DALTest extends PHPUnit_Framework_TestCase {

    /**
     * @var DAL
     */
    private $dal;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->dal = new DAL();
        global $host,$base,$login,$mdp;
        $host="mysql:host=localhost;";
        $base="dbname=vsi";
        $login="root";
        $mdp="";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DAL::donnerDerniersArticles
     * @todo   Implement testDonnerDerniersArticles().
     */
    public function testDonnerDerniersArticles() {
        //test de la première méthode
        $resultat = $this->dal->donnerDerniersArticles("date_publication");
        $this->assertEquals(count($resultat),5);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);   
        //test de la deuxième méthode
        $resultat = $this->dal->donnerDerniersArticles("date_aspiration");
        $this->assertEquals(count($resultat),5);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
    }

    /**
     * @covers DAL::donnerArticle
     * @todo   Implement testDonnerArticle().
     */
    public function testDonnerArticle() {
       $this->assertInstanceOf("ArticleWeb", $this->dal->donnerArticle("089ebd5bb4"));
    }

    /**
     * @covers DAL::donnerArticleMotsCles
     * @todo   Implement testDonnerArticleMotsCles().
     */
    public function testDonnerArticleMotsCles() {
        $this->assertInternalType("array", $this->dal->donnerArticleMotsCles("089ebd5bb4"));
    }

    /**
     * @covers DAL::donnerListeCategoriesMaladies
     * @todo   Implement testDonnerListeCategoriesMaladies().
     */
    public function testDonnerListeCategoriesMaladies() {
        $this->assertInternalType("array", $this->dal->donnerListeCategoriesMaladies());
    }

    /**
     * @covers DAL::donnerListeMotsclesSymptomes
     * @todo   Implement testDonnerListeMotsclesSymptomes().
     */
    public function testDonnerListeMotsclesSymptomes() {
        $this->assertInternalType("array", $this->dal->donnerListeMotsclesSymptomes());
    }

    /**
     * @covers DAL::donnerListeHotes
     * @todo   Implement testDonnerListeHotes().
     */
    public function testDonnerListeHotes() {
        $resultat = $this->dal->donnerListeHotes();
        $this->assertInstanceOf("Hote",  $resultat[0]);
    }

    /**
     * @covers DAL::donnerListeSources
     * @todo   Implement testDonnerListeSources().
     */
    public function testDonnerListeSources() {
        $this->assertInternalType("array", $this->dal->donnerListeSources());
    }

    /**
     * @covers DAL::rechercherParMaladiesSymptomesHotesSourcesDates
     * @todo   Implement testRechercherParMaladiesSymptomesHotesSourcesDates().
     */
    public function testRechercherParMaladiesSymptomesHotesSourcesDates() {
        $listeMaladie = array("Bluetongue","West Nile fever");
        $listeSymptome = array("lameness","vomiting");
        $listeHotes = array("cattle","pigs");
        $listeSources = array("Omak Okanogan County Chronicle","AG Week");
        $dates = array(1443106569,1448380569);
        
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, $listeSymptome, $listeHotes, null, null, null, null, null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, $listeHotes, null, null, null, null, null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, null, null, null, null, null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, null, null, null, null, 111);
        $this->assertNull($resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates($listeMaladie, $listeSymptome, $listeHotes, $listeSources, $dates, "disease", "disease", "unofficial");
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, null, null, null, "disease", null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, null, null, "disease", null, null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, null, null, null, null, "unofficial");
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, null, $dates, null, null, null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
        $resultat = $this->dal->rechercherParMaladiesSymptomesHotesSourcesDates(null, null, null, $listeSources, null, null, null, null);
        $this->assertInstanceOf("ArticleWeb",  $resultat[0]);
    }

    /**
     * @covers DAL::donnerListeFluxRSS
     * @todo   Implement testDonnerListeFluxRSS().
     */
    public function testDonnerListeFluxRSS() {
        $resultat = $this->dal->donnerListeFluxRSS();
        $this->assertInstanceOf("FluxRSS",  $resultat[0]);
    }

    /**
     * @covers DAL::verifierFluxExistant
     * @todo   Implement testVerifierFluxExistant().
     */
    public function testVerifierFluxExistant() {
        $this->assertEquals($this->dal->verifierFluxExistant("dbd7790bcd"),1);
    }

    /**
     * @covers DAL::ajoutFluxRSS
     * @todo   Implement testAjoutFluxRSS().
     */
    public function testAjoutFluxRSS() {
        $this->dal->ajoutFluxRSS("idtest", "http://ceci-est-un-test.com", "official");
        $this->assertEquals($this->dal->verifierFluxExistant("idtest"),1);
        
    }

    /**
     * @covers DAL::verifierFluxAArticle
     * @todo   Implement testVerifierFluxAArticle().
     */
    public function testVerifierFluxAArticle() {
        $this->assertLessThanOrEqual($this->dal->verifierFluxAArticle("063f31a900"),1);
    }

    /**
     * @covers DAL::donnerFiabiliteDuFlux
     * @todo   Implement testDonnerFiabiliteDuFlux().
     */
    public function testDonnerFiabiliteDuFlux() {
        $this->assertEquals($this->dal->donnerFiabiliteDuFlux("063f31a900"),"unofficial");
    }

    /**
     * @covers DAL::mettreAJourArticleRSSfeed
     * @todo   Implement testMettreAJourArticleRSSfeed().
     */
    public function testMettreAJourArticleRSSfeed() {
        $this->dal->mettreAJourArticleRSSfeed("063f31a900", "idtest");
        $this->assertLessThanOrEqual($this->dal->verifierFluxAArticle("idtest"),1);
        $this->dal->mettreAJourArticleRSSfeed("idtest", "063f31a900");
    }

    /**
     * @covers DAL::suppressionFluxRSS
     * @todo   Implement testSuppressionFluxRSS().
     */
    public function testSuppressionFluxRSS() {
        $this->dal->suppressionFluxRSS("idtest");
        $this->assertEquals($this->dal->verifierFluxExistant("idtest"),0);        
    }
    
     /**
     * @covers DAL::ajoutHote
     * @covers DAL::verifierHoteExistant
     * @covers DAL::suppressionHote
     * @todo   Implement testAjoutHote().
     */
    public function testAjoutHote() {
        $this->dal->ajoutHote("hoteTest");
        $this->assertEquals($this->dal->verifierHoteExistant("hoteTest"),1);
        $this->dal->suppressionHote("hoteTest");        
        $this->assertEquals($this->dal->verifierHoteExistant("hoteTest"),0);
    }

    /**
     * @covers DAL::donnerListeMaladiesAvecHotes
     * @todo   Implement testDonnerListeMaladiesAvecHotes().
     */
    public function testDonnerListeMaladiesAvecHotes() {
        $this->assertInternalType("array", $this->dal->donnerListeMaladiesAvecHotes());
    }

    /**
     * @covers DAL::verifierMaladieExistante
     * @todo   Implement testVerifierMaladieExistante().
     */
    public function testVerifierMaladieExistante() {
        $this->assertEquals($this->dal->verifierMaladieExistante("Bluetongue"),1);
    }

    /**
     * @covers DAL::donnerIdEnregistrement
     * @todo   Implement testDonnerIdEnregistrement().
     */
    public function testDonnerIdEnregistrement() {        
        $this->assertEquals($this->dal->donnerIdEnregistrement("host", "keyword", "pigs"),1);
    }

    /**
     * @covers DAL::verifierAssHoteMaladie
     * @todo   Implement testVerifierAssHoteMaladie().
     */
    public function testVerifierAssHoteMaladie() {
        $this->assertEquals($this->dal->verifierAssHoteMaladie(74, 1),1);
    }

    /**
     * @covers DAL::ajoutMaladie
     * @covers DAL::suppressionEnregistrementMaladie
     * @todo   Implement testAjoutMaladie().
     */
    public function testAjoutMaladie() {
        $this->dal->ajoutMaladie("maladieTest", "categorieTest");
        $this->assertEquals($this->dal->verifierMaladieExistante("maladieTest"),1);
        $idMaladieAjout = $this->dal->donnerIdEnregistrement("disease", "keyword", "maladieTest");
        $this->dal->suppressionEnregistrementMaladie($idMaladieAjout);
        $this->assertEquals($this->dal->verifierMaladieExistante("maladieTest"),0);
    }

    /**
     * @covers DAL::ajoutAssHoteMaladie
     * @covers DAL::suppressionAssHoteMaladie
     * @todo   Implement testAjoutAssHoteMaladie().
     */
    public function testAjoutAssHoteMaladie() {
        $this->dal->ajoutMaladie("maladieTest", "categorieTest");
        $idMaladieAjout = $this->dal->donnerIdEnregistrement("disease", "keyword", "maladieTest");
        $this->dal->ajoutAssHoteMaladie($idMaladieAjout, 1);
        $this->assertEquals($this->dal->verifierAssHoteMaladie($idMaladieAjout, 1),1);
        $this->dal->suppressionAssHoteMaladie($idMaladieAjout, 1);
        $this->assertEquals($this->dal->verifierAssHoteMaladie($idMaladieAjout, 1),0);
        $this->dal->suppressionEnregistrementMaladie($idMaladieAjout);
        
    }

    /**
     * @covers DAL::donnerListeSymptomesAvecHotes
     * @todo   Implement testDonnerListeSymptomesAvecHotes().
     */
    public function testDonnerListeSymptomesAvecHotes() {
        $this->assertInternalType("array", $this->dal->donnerListeSymptomesAvecHotes());
    }

    /**
     * @covers DAL::verifierSymptomeEtCategorieExistant
     * @todo   Implement testVerifierSymptomeEtCategorieExistant().
     */
    public function testVerifierSymptomeEtCategorieExistant() {
        $this->assertEquals($this->dal->verifierSymptomeEtCategorieExistant("diarrhea", "Porcine_Digestive_diarrhea"),1);
    }

    /**
     * @covers DAL::donnerIdEnregistrementSymptomeEtCategorie
     * @todo   Implement testDonnerIdEnregistrementSymptomeEtCategorie().
     */
    public function testDonnerIdEnregistrementSymptomeEtCategorie() {
        $this->assertEquals($this->dal->donnerIdEnregistrementSymptomeEtCategorie("diarrhea", "Porcine_Digestive_diarrhea"),1);
    }

    /**
     * @covers DAL::verifierAssHoteSymptome
     * @todo   Implement testVerifierAssHoteSymptome().
     */
    public function testVerifierAssHoteSymptome() {
        $this->assertEquals($this->dal->verifierAssHoteSymptome(1, 1),1);
    }

    /**
     * @covers DAL::ajoutAssHoteSymptome
     * @covers DAL::suppressionAssHoteSymptome
     * @todo   Implement testAjoutAssHoteSymptome().
     */
    public function testAjoutAssHoteSymptome() {
        $this->dal->ajoutSymptome("symptomeTest", "categorieTest");
        $this->assertEquals($this->dal->verifierSymptomeEtCategorieExistant("symptomeTest", "categorieTest"),1);
        $idSymptomeAjout = $this->dal->donnerIdEnregistrement("symptom", "keyword", "symptomeTest");
        $this->dal->ajoutAssHoteSymptome($idSymptomeAjout, 1);
        $this->assertEquals($this->dal->verifierAssHoteSymptome($idSymptomeAjout, 1),1);
        $this->dal->suppressionAssHoteSymptome($idSymptomeAjout, 1);
        $this->assertEquals($this->dal->verifierAssHoteSymptome($idSymptomeAjout, 1),0);        
        $this->dal->suppressionEnregistrementSymptome($idSymptomeAjout);
    }

    /**
     * @covers DAL::ajoutSymptome
     * @covers DAL::suppressionEnregistrementSymptome
     * @todo   Implement testAjoutSymptome().
     */
    public function testAjoutSymptome() {
        $this->dal->ajoutSymptome("symptomeTest", "categorieTest");
        $this->assertEquals($this->dal->verifierSymptomeEtCategorieExistant("symptomeTest", "categorieTest"),1);
        $idSymptomeAjout = $this->dal->donnerIdEnregistrement("symptom", "keyword", "symptomeTest");
        $this->dal->suppressionEnregistrementSymptome($idSymptomeAjout);
        $this->assertEquals($this->dal->verifierSymptomeEtCategorieExistant("symptomeTest", "categorieTest"),0);
    }

    /**
     * @covers DAL::donnerNbArticleSurLeMois
     * @todo   Implement testDonnerNbArticleSurLeMois().
     */
    public function testDonnerNbArticleSurLeMois() {
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleSurLeMois(1446372856, null),1);
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleSurLeMois(1446372856, "Highly pathogenic avian influenza "),1);
    }

    /**
     * @covers DAL::donnerNbArticleEntreDateEtFinMois
     * @todo   Implement testDonnerNbArticleEntreDateEtFinMois().
     */
    public function testDonnerNbArticleEntreDateEtFinMois() {
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleEntreDateEtFinMois(1446372856, null),1);
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleEntreDateEtFinMois(1446372856, "Highly pathogenic avian influenza "),1);
    }

    /**
     * @covers DAL::donnerNbArticleEntreDateEtDebutMois
     * @todo   Implement testDonnerNbArticleEntreDateEtDebutMois().
     */
    public function testDonnerNbArticleEntreDateEtDebutMois() {
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleEntreDateEtDebutMois(1448532856, null),1);
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleEntreDateEtDebutMois(1448532856, "Highly pathogenic avian influenza "),1);
    }

    /**
     * @covers DAL::donnerNbArticleEntre2Dates
     * @todo   Implement testDonnerNbArticleEntre2Dates().
     */
    public function testDonnerNbArticleEntre2Dates() {
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleEntre2Dates(1446372856, 1448532856, null),1);
        $this->assertLessThanOrEqual($this->dal->donnerNbArticleEntre2Dates(1446372856, 1448532856, "Highly pathogenic avian influenza "),1);
    }

    /**
     * @covers DAL::rechercherMaladie
     * @todo   Implement testRechercherMaladie().
     */
    public function testRechercherMaladie() {
        $this->dal->ajoutMaladie("maladieTest", "categorieTest");        
        $this->assertInternalType("array", $this->dal->rechercherMaladie("categorieTest"));
        $idAjoutMaladie = $this->dal->donnerIdEnregistrement("disease", "keyword", "maladieTest");
        $this->dal->suppressionEnregistrementMaladie($idAjoutMaladie);
    }

}
