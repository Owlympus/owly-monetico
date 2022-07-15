<?php

namespace OwlyMonetico\Collection;

abstract class Currency
{
    use _Tools;

    /**
     * Afghani (AFGHANISTAN)
     */
    const AFN = 'AFN';

    /**
     * Rand (AFRIQUE DU SUD)
     */
    const ZAR = 'ZAR';

    /**
     * Lek (ALBANIE)
     */
    const ALL = 'ALL';

    /**
     * Dinars algériens (ALGERIE)
     */
    const DZD = 'DZD';

    /**
     * Euro (ALLEMAGNE)
     */
    const EUR = 'EUR';

    /**
     * Kwanza (ANGOLA)
     */
    const AOA = 'AOA';

    /**
     * Dollar des Caraïbes orientales (ANGUILLA)
     */
    const XCD = 'XCD';

    /**
     * Riyal Saoudiens (ARABIE SAOUDITE)
     */
    const SAR = 'SAR';

    /**
     * Peso Argentin (ARGENTINE)
     */
    const ARS = 'ARS';

    /**
     * Dram Armenien (ARMENIE)
     */
    const AMD = 'AMD';

    /**
     * Aruban Florin (ARUBA)
     */
    const AWG = 'AWG';

    /**
     * Australian Dollar (AUSTRALIE)
     */
    const AUD = 'AUD';

    /**
     * Azerbaijanian Manat (AZERBAIJAN)
     */
    const AZN = 'AZN';

    /**
     * Dollar Bahaméen (BAHAMAS (LES))
     */
    const BSD = 'BSD';

    /**
     * Dinar Bahraini (BAHRAIN)
     */
    const BHD = 'BHD';

    /**
     * Taka (BANGLADESH)
     */
    const BDT = 'BDT';

    /**
     * Dollars Barbados (BARBADOS)
     */
    const BBD = 'BBD';

    /**
     * Dollar de Bélize (BELIZE)
     */
    const BZD = 'BZD';

    /**
     * CFA Franc BCEAO (BENIN)
     */
    const XOF = 'XOF';

    /**
     * Dollar Bermudien (BERMUDES)
     */
    const BMD = 'BMD';

    /**
     * Ngultrum (BHUTAN)
     */
    const BTN = 'BTN';

    /**
     * Indian Rupee Indienne (BHUTAN)
     */
    const INR = 'INR';

    /**
     * Ruble Biélorusse (BIÉLORUSSIE)
     */
    const BYR = 'BYR';

    /**
     * Mvdol (BOLIVIE (ÉTAT PLURINATIONAL DE ))
     */
    const BOV = 'BOV';

    /**
     * Boliviano (BOLIVIE (ÉTAT PLURINATIONAL DE))
     */
    const BOB = 'BOB';

    /**
     * Mark Convertible (BOSNIE-HERZEGOVINE)
     */
    const BAM = 'BAM';

    /**
     * Pula (BOTSWANA)
     */
    const BWP = 'BWP';

    /**
     * Couronne Norvégienne (BOUVET ILE)
     */
    const NOK = 'NOK';

    /**
     * Brunei Dollar (BRUNEI DARUSSALAM)
     */
    const BND = 'BND';

    /**
     * Real Brésilien (BRÉSIL)
     */
    const BRL = 'BRL';

    /**
     * Lev Bulgare (BULGARIE)
     */
    const BGN = 'BGN';

    /**
     * Franc Burundi (BURUNDI)
     */
    const BIF = 'BIF';

    /**
     * Cabo Verde Escudo (CABO VERDE)
     */
    const CVE = 'CVE';

    /**
     * Riel (CAMBODIA)
     */
    const KHR = 'KHR';

    /**
     * Franc CFA BEAC (CAMEROUNE)
     */
    const XAF = 'XAF';

    /**
     * Dollar Canadien (CANADA)
     */
    const CAD = 'CAD';

    /**
     * Cayman Islands Dollar (CAYMAN ISLANDS (THE))
     */
    const KYD = 'KYD';

    /**
     * Unidad de Fomento (CHILE)
     */
    const CLF = 'CLF';

    /**
     * Peso Chilien (CHILIE)
     */
    const CLP = 'CLP';

    /**
     * Yuan Renminbi (CHINE)
     */
    const CNY = 'CNY';

    /**
     * Peso Colombien (COLOMBIE)
     */
    const COP = 'COP';

    /**
     * Unidad de Valor Real (COLOMBIE)
     */
    const COU = 'COU';

    /**
     * Franc Comorien (COMORES (LES))
     */
    const KMF = 'KMF';

    /**
     * Le Franc Congolais (CONGO (LA RÉPUBLIQUE DÉMOCRATIQUE DU))
     */
    const CDF = 'CDF';

    /**
     * Dollar Néo-Zélandais (COOK ILES (LES))
     */
    const NZD = 'NZD';

    /**
     * Won (CORÉE (LA RÉPUBLIQUE DE))
     */
    const KRW = 'KRW';

    /**
     * Won Nord-coréen (CORÉE (LA RÉPUBLIQUE DÉMOCRATIQUE DE ))
     */
    const KPW = 'KPW';

    /**
     * Costa Rican Colon (COSTA RICA)
     */
    const CRC = 'CRC';

    /**
     * Kuna (CROATIE)
     */
    const HRK = 'HRK';

    /**
     * Peso Convertible (CUBA)
     */
    const CUC = 'CUC';

    /**
     * Peso Cubain (CUBA)
     */
    const CUP = 'CUP';

    /**
     * Florin des Antilles néerlandaises (CURAÇAO)
     */
    const ANG = 'ANG';

    /**
     * Couronne Danoise (DANEMARK)
     */
    const DKK = 'DKK';

    /**
     * Franc Djiboutien (DJIBOUTI)
     */
    const DJF = 'DJF';

    /**
     * Pound Égyptien (EGYPTE)
     */
    const EGP = 'EGP';

    /**
     * Dollar US (EQUATEUR)
     */
    const USD = 'USD';

    /**
     * Nakfa (ERITHRÉE)
     */
    const ERN = 'ERN';

    /**
     * Birr Éthiopienne (ETHIOPIE)
     */
    const ETB = 'ETB';

    /**
     * Livre des Îles Malouines (FALKLAND ILES (LES) [MALOUINES])
     */
    const FKP = 'FKP';

    /**
     * Dollar des Fiji (FIJI)
     */
    const FJD = 'FJD';

    /**
     * SDR (Droit de tirage spécial) (FOND MONÉTAIRE INTERNATIONAL (IMF) )
     */
    const XDR = 'XDR';

    /**
     * Dalasi (GAMBIE (LA))
     */
    const GMD = 'GMD';

    /**
     * Lari (GEORGIE)
     */
    const GEL = 'GEL';

    /**
     * Cedi du Ghana (GHANA)
     */
    const GHS = 'GHS';

    /**
     * Pound de Gibraltar (GIBRALTAR)
     */
    const GIP = 'GIP';

    /**
     * Quetzal (GUATEMALA)
     */
    const GTQ = 'GTQ';

    /**
     * Livre Sterlling (GUERNESEY)
     */
    const GBP = 'GBP';

    /**
     * Franc Guinéen (GUINÉE)
     */
    const GNF = 'GNF';

    /**
     * Dollar guyanien (GUYANa)
     */
    const GYD = 'GYD';

    /**
     * Gourde (HAITI)
     */
    const HTG = 'HTG';

    /**
     * Lempira (HONDURAS)
     */
    const HNL = 'HNL';

    /**
     * Dollar de Hong Kong (HONG KONG)
     */
    const HKD = 'HKD';

    /**
     * Forint (HONGRIE)
     */
    const HUF = 'HUF';

    /**
     * Rupiah (INDONESIE)
     */
    const IDR = 'IDR';

    /**
     * Rial Iranien (IRAN (RÉPUBLIQUE ISLAMIQUE D'))
     */
    const IRR = 'IRR';

    /**
     * Dinar Iraquien (IRAQ)
     */
    const IQD = 'IQD';

    /**
     * Couronne Islandaise (ISLANDE)
     */
    const ISK = 'ISK';

    /**
     * Nouveau Sheqel Israélien (ISRAEL)
     */
    const ILS = 'ILS';

    /**
     * Dollars Jamaicain (JAMAIQUE)
     */
    const JMD = 'JMD';

    /**
     * Yen (JAPON)
     */
    const JPY = 'JPY';

    /**
     * Dinars Jordanien (JORDANIE)
     */
    const JOD = 'JOD';

    /**
     * Tenge (KAZAKHSTAN)
     */
    const KZT = 'KZT';

    /**
     * Shilling Kenyan (KENYA)
     */
    const KES = 'KES';

    /**
     * Som (KIRGHIZISTAN)
     */
    const KGS = 'KGS';

    /**
     * Dinar Kowaitien (KOWAIT)
     */
    const KWD = 'KWD';

    /**
     * Kip (LAO RÉPUBLIQUE DÉMOCRATIQUE POPULAIRE DU (LA))
     */
    const LAK = 'LAK';

    /**
     * Le Colon Salvadorien (LE SALVADOR)
     */
    const SVC = 'SVC';

    /**
     * Loti (LESOTHO)
     */
    const LSL = 'LSL';

    /**
     * Pound Libanais (LIBAN)
     */
    const LBP = 'LBP';

    /**
     * Dollar du Liberia (LIBERIA)
     */
    const LRD = 'LRD';

    /**
     * Dinars Libien (LIBYE)
     */
    const LYD = 'LYD';

    /**
     * Swiss Franc (LIECHTENSTEIN)
     */
    const CHF = 'CHF';

    /**
     * Pataca (MACAO)
     */
    const MOP = 'MOP';

    /**
     * Denar (MACEDONIE (ANCIENNE RÉPUBLIQUE YOUGOSLAVE DE))
     */
    const MKD = 'MKD';

    /**
     * Malagasy Ariary (MADAGASCAR)
     */
    const MGA = 'MGA';

    /**
     * Kwacha (MALAWI)
     */
    const MWK = 'MWK';

    /**
     * Ringgi Malaisien (MALAYSIE)
     */
    const MYR = 'MYR';

    /**
     * Rufiyaa (MALDIVES)
     */
    const MVR = 'MVR';

    /**
     * Mauritius Rupee (MAURICE)
     */
    const MUR = 'MUR';

    /**
     * Ouguiya (MAURITANIE)
     */
    const MRO = 'MRO';

    /**
     * Peso Mexicain (MEXIQUE)
     */
    const MXN = 'MXN';

    /**
     * Mexican Unidad de Inversion (UDI) (MEXIQUE)
     */
    const MXV = 'MXV';

    /**
     * Leu Moldavien (MOLDOVIE (LA RÉPUBLIQUE DE))
     */
    const MDL = 'MDL';

    /**
     * Tugrik (MONGOLIE)
     */
    const MNT = 'MNT';

    /**
     * Dirham Marocain (MOROCCO)
     */
    const MAD = 'MAD';

    /**
     * Metical (MOZAMBIQUE)
     */
    const MZN = 'MZN';

    /**
     * Kyat (MYANMAR)
     */
    const MMK = 'MMK';

    /**
     * Dollar Namibien (NAMIBIE)
     */
    const NAD = 'NAD';

    /**
     * Cordoba (NICARAGUA)
     */
    const NIO = 'NIO';

    /**
     * Naira (NIGERIA)
     */
    const NGN = 'NGN';

    /**
     * Franc CFP (NOUVELLE CALÉDONIE)
     */
    const XPF = 'XPF';

    /**
     * Rupee Népalais (NÉPAL)
     */
    const NPR = 'NPR';

    /**
     * Rial Omani (OMAN)
     */
    const OMR = 'OMR';

    /**
     * Shilling Ougandaisg (OUGANDA)
     */
    const UGX = 'UGX';

    /**
     * Sum d'Oubekistan (OUZBEKISTAN)
     */
    const UZS = 'UZS';

    /**
     * Rupee du Pakistan (PAKISTAN)
     */
    const PKR = 'PKR';

    /**
     * Balboa (PANAMA)
     */
    const PAB = 'PAB';

    /**
     * Kina (PAPOUASIE NOUVELLE GUINÉE)
     */
    const PGK = 'PGK';

    /**
     * Guarani (PARAGUAY)
     */
    const PYG = 'PYG';

    /**
     * Unité de compte de la BAD (PAYS MEMBRES DU GROUPE DE LA BANQUE AFRICAINE DE DEVELOPPEMENT)
     */
    const XUA = 'XUA';

    /**
     * Nouveau Sol (PEROU)
     */
    const PEN = 'PEN';

    /**
     * Peso Phillipins (PHILIPPINES (LES))
     */
    const PHP = 'PHP';

    /**
     * Zloty (POLOGNE)
     */
    const PLN = 'PLN';

    /**
     * Rial Qatari (QATAR)
     */
    const QAR = 'QAR';

    /**
     * Leu Roumain (ROUMANIE)
     */
    const RON = 'RON';

    /**
     * Ruble Russe (RUSSIE FÉDÉRATION (LA))
     */
    const RUB = 'RUB';

    /**
     * Franc Rwandais (RWANDA)
     */
    const RWF = 'RWF';

    /**
     * Peso Dominicain (RÉPUBLIQUE DOMINICAINE (LA))
     */
    const DOP = 'DOP';

    /**
     * Couronne Tchèque (RÉPUBLIQUE TCHÈQUE (LA))
     */
    const CZK = 'CZK';

    /**
     * Livre de Saint Helene (Sainte-Hélène, Ascension et Tristan da CunhaA)
     */
    const SHP = 'SHP';

    /**
     * Tala (SAMOA)
     */
    const WST = 'WST';

    /**
     * Dobra (SAO TOME ET PRINCIPE)
     */
    const STD = 'STD';

    /**
     * Dinar Serbe (SERBIE)
     */
    const RSD = 'RSD';

    /**
     * Rupee des Seychelles (SEYCHELLES)
     */
    const SCR = 'SCR';

    /**
     * Leone (SIERRA LEONE)
     */
    const SLL = 'SLL';

    /**
     * Dollar Singaporien (SINGAPOUR)
     */
    const SGD = 'SGD';

    /**
     * Sucre (SISTEMA UNITARIO DE COMPENSACION REGIONAL DE PAGOS SUCRE)
     */
    const XSU = 'XSU';

    /**
     * Dollar des îles Solomon (SOLOMON ILES S)
     */
    const SBD = 'SBD';

    /**
     * Shilling Somalien (SOMALIE)
     */
    const SOS = 'SOS';

    /**
     * Livre Soudanais (SOUDAN (LE))
     */
    const SDG = 'SDG';

    /**
     * Livre sud-soudanaise (SOUDAN DU SUD)
     */
    const SSP = 'SSP';

    /**
     * Rupee Sri Lankais (SRI LANKA)
     */
    const LKR = 'LKR';

    /**
     * WIR Euro (SUISSE)
     */
    const CHE = 'CHE';

    /**
     * Franc WIR (SUISSE)
     */
    const CHW = 'CHW';

    /**
     * Dollars du Surinam (SURINAME)
     */
    const SRD = 'SRD';

    /**
     * Couronne Suédoise (SUÈDE)
     */
    const SEK = 'SEK';

    /**
     * Lilangeni (SWAZILAND)
     */
    const SZL = 'SZL';

    /**
     * Pound Syrien (SYRIE, REPUBLIQUE ARABE DE)
     */
    const SYP = 'SYP';

    /**
     * Somoni (TADJIKISTAN)
     */
    const TJS = 'TJS';

    /**
     * Nouveau dollars Taiwanais (TAIWAN (PROVINCE DE CHINE))
     */
    const TWD = 'TWD';

    /**
     * Shilling Tanzanien (TANZANIE, RÉPUBLIQUE UNIE DE)
     */
    const TZS = 'TZS';

    /**
     * Baht (THAILANDE)
     */
    const THB = 'THB';

    /**
     * Pa’anga (TONGA)
     */
    const TOP = 'TOP';

    /**
     * Dollars de Trinidad et Tobago (TRINIDAD et TOBAGO)
     */
    const TTD = 'TTD';

    /**
     * Dinars Tunisiens (TUNISIA)
     */
    const TND = 'TND';

    /**
     * Turkménistan Nouveau Manat (TURKMENISTAN)
     */
    const TMT = 'TMT';

    /**
     * Livre Turque (TURQUIE)
     */
    const TRY = 'TRY';

    /**
     * Hryvnia (UKRAINE)
     */
    const UAH = 'UAH';

    /**
     * Dirham UAE (UNITED ARAB EMIRATES (THE))
     */
    const AED = 'AED';

    /**
     * Uruguay Peso en Unidades Indexadas (URUIURUI) (URUGUAY)
     */
    const UYI = 'UYI';

    /**
     * Peso Uruguayen (URUGUAY)
     */
    const UYU = 'UYU';

    /**
     * Vatu (VANUATU)
     */
    const VUV = 'VUV';

    /**
     * Bolivar (VENEZUELA (RÉPUBLIQUE DE BOLIVARIE))
     */
    const VEF = 'VEF';

    /**
     * Dong (VIETNAM)
     */
    const VND = 'VND';

    /**
     * Rial du Yemenl (YEMEN)
     */
    const YER = 'YER';

    /**
     * Kwacha Zambien (ZAMBIE)
     */
    const ZMW = 'ZMW';

    /**
     * Dollars du Zimbabwe (ZIMBABWE)
     */
    const ZWL = 'ZWL';

    /**
     * Dollars US (Prochain jours) (ÉTATS-UNIS D'AMÉRIQUE (Les))
     */
    const USN = 'USN';
}