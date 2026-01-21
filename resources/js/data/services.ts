import creditImg from '@/assets/images/credit/confident-black-lady-sitting-holding-wad-cash-isolated-background(1).jpg'
import epargneImg from '@/assets/images/epargne/close-up-money-put-aside-savings.jpg'


export const allServices = [
  {
    id: 'pack-woezon',
    category: 'packs',
    name: 'Pack Woezon',
    desc: 'L\'essentiel pour bien démarrer votre relation bancaire',
    popular: false,
    image: null,
    avantages : [
      "Beaucoup d'argents ! "
    ],
    documents : [
      "Carte d'identité/ carte de séjour",
      "Ta carte personnel",
      "Ta signature et celle d'une témoin"
    ],
    special: false
  },
  {
    id: 'pack-solo',
    category: 'packs',
    name: 'Pack Solo',
    desc: 'Destiné aux PME, avec un crédit jusqu\'à 10 millions FCFA...',
    popular: true,
    image: null,
    avantages : [
      "Beaucoup d'argents ! "
    ],
    documents : [
      "Carte d'identité/ carte de séjour",
      "Ta carte personnel",
    ],
    special: false
  },
  {
    id: 'credit-particulier',
    category: 'credits',
    name: 'Crédit Particuliers',
    desc: 'Concrétisez vos projets personnels avec nos solutions...',
    popular: false,
    image: creditImg,
    documents : [
      "Carte d'identité/ carte de séjour",
      "Ta carte personnel",
    ],
    avantages : [
      "Beaucoup d'argents ! ",
    ],

    special: false
  },

  {
    id: 'epargne-particulier',
    category: 'epargnes',
    name: 'Epargne Particuliers',
    desc: 'Concrétisez vos projets personnels avec nos solutions de financement flexibles.',
    popular: false,
      image: epargneImg,
    documents : [
      "Carte d'identité/ carte de séjour",
      "Ta carte personnel",
    ],
    avantages : [
      "Beaucoup d'argents ! ",
    ],

    special: false
  },


  // Ajoute tous tes autres services ici avec leur "category"
];
