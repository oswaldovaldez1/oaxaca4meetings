var firebase = require("firebase/app");
require("firebase/auth");
require("firebase/firestore");
require("firebase/storage");

const firebaseConfig = {
    apiKey: "AIzaSyBVhV2h2I8YKjjDJjQXkwUhiPTN0S7UyUM",
    authDomain: "lanesa1957-b9899.firebaseapp.com",
    databaseURL: "https://lanesa1957-b9899.firebaseio.com",
    projectId: "lanesa1957-b9899",
    storageBucket: "lanesa1957-b9899.appspot.com",
    messagingSenderId: "239672439560",
    appId: "1:239672439560:web:8b41bc6bce26bd8b3ff2bd",
    measurementId: "G-1QV0N87FBK"
    // apiKey: "",
    // authDomain: "",
    // databaseURL: "",
    // projectId: "",
    // storageBucket: "",
    // messagingSenderId: "",
    // appId: "",
    // measurementId: ""
};
firebase.initializeApp(firebaseConfig);
//firebase.analytics();

const db = firebase.firestore();
const auth = firebase.auth();
const storage = firebase.storage();

export {
    firebase,
    db,
    auth,
    storage
};
