class Person{
    constructor(name,age){
        this.name = name;
        this.age = age;
    }
    getterName(){
        return this.name;
    }
    getterAge(){
        return this.age;
    }
}

class Prosecutor extends Person{
    constructor(name,age){
        super(name,age);
    }
    prosecute(defendant,case1){
        defendant.setCase(case1);
    }
}

/* defendant and his/her case */
class Case{
    imprisonmentTerm = '';
    ageLimit = {};
    constructor(title,years,months,days,minAge,maxAge){
        this.title = title;
        this.imprisonmentTerm = (years * 365) + (months * 30) + days;
        this.ageLimit = {min : minAge,
                        max : maxAge }
    }
    computeReleaseDate(){
        console.log('computing release date');
    }
}
class Defendant extends Person{
    constructor(name,age){
        super(name,age);
    }
    setCase(case1){
        this.case1 = case1;
    }
    getterCase(){
        return this.case1;
    }
}

/* trialcourt */
class TrialCourt{
    static initiateTrial(defendant,prosecutor){
        let verdict = this.getVerdict(defendant);
        let logs = {
            name : defendant.getterName(),
            age : defendant.getterAge(),
            caseTitle : defendant.getterCase().title,
            filedBy : prosecutor.getterName(),
            verdict : verdict
        }
        console.log('Name : '+ logs.name);
        console.log('Age : '+ logs.age +' yeasr old');
        console.log('Case Title : '+logs.caseTitle);
        console.log('Filed by : '+logs.filedBy);
        console.log('Verdict : '+logs.verdict);
        if(this.releaseDate){
            console.log('Release date : '+this.releaseDate);
        }
    }
    static getVerdict(defendant){
        let ageLimit = defendant.case1.ageLimit;
        let age = defendant.getterAge();
        if(age>= ageLimit.min && age<= ageLimit.max){
            this.computeReleaseDate(defendant.case1.imprisonmentTerm);
            return 'GUILTY'
        }else{
            return 'NOT GUILTY'
        }
    }
    static computeReleaseDate(days){
        let monthNames = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        let dateNow = new Date();
        let udpatedDate = dateNow.setDate(dateNow.getDate() + days);
        udpatedDate = new Date(udpatedDate);
        let month = monthNames[udpatedDate.getMonth()];
        let date = udpatedDate.getDate();
        let year = udpatedDate.getFullYear();
        this.releaseDate = date+' '+month+' '+year;
    }
}
/* actions */
// let case1 = new Case("Malicious Mischief", 3, 3, 3, 18, 75);
// let prosecutor = new Prosecutor ("John", 30);
// let defendant1 = new Defendant ("Girlie", 5);
// prosecutor.prosecute(defendant1, case1);
// TrialCourt.initiateTrial(defendant1, prosecutor);

let case1 = new Case("Malicious Mischief", 3, 3, 3, 18, 75);
let prosecutor = new Prosecutor ("John", 30);
let defendant2 = new Defendant ("Onel", 25);
prosecutor.prosecute(defendant2, case1);
TrialCourt.initiateTrial(defendant2, prosecutor); 