let User = getCookie("username");

let dbConnection = SQL.connect({
    Driver: "MySQL",
    Host: "localhost",
    Port: 3306,
    Database: "TheSource",
    UserName: "root",
    Password: ""
});
let sql = "SELECT Health, Score, Lives, KeyCollected\
           FROM players\
           WHERE username = " + User + " ";
let result = dbConnection.query(sql);
if (!result.isValid) {
    test.fail("Entry not found.");
} else {
    test.compare(result.value("name"), context.userData.formValues[0]);
    test.compare(result.value("email"), context.userData.formValues[1]);
    test.compare(result.value("company"), context.userData.formValues[2]);
    test.compare(result.value("country"), context.userData.formValues[3]);
    test.compare(result.value("product"), context.userData.formValues[4]);
}
dbConnection.close();