// Add Post
document.querySelector(".add").addEventListener("click" , function () {
    document.querySelector(".add-post-js").style.display = "flex" ;
})

document.querySelector(".add").addEventListener("click" , function () {
    document.querySelector(".hero-card").style.display = "none" ;
})

// Account Activity
document.querySelector(".account-activity").addEventListener("click", function () {
    document.querySelector(".activity").style.display = "flex" ;
})

document.querySelector(".account-activity").addEventListener("click" , () => {
    document.querySelector(".hero-card", ".post-row").style.display = "none" ;
})

// Setting 
document.querySelector(".setting").addEventListener("click", function () {
    document.querySelector(".setting-section").style.display = "flex" ;
})

document.querySelector(".setting").addEventListener("click" , () => {
    document.querySelector(".hero-card", ".post-row").style.display = "none" ;
})

// bio post
document.querySelector(".edit").addEventListener("click", function () {
    document.querySelector(".bi-post").style.display = "flex" ;
})

document.querySelector(".edit").addEventListener("click", function () {
    document.querySelector(".hero-card", "post-row").style.display = "none" ;
})
// document.querySelector("#edit").onclick = function () {
//     document.querySelector(".bi-post").style.display = "none";
// }

// hobby
document.querySelector(".hobby-edit").addEventListener("click", () => {
    document.querySelector(".hobby-click").style.display = "flex" ;
})

document.querySelector(".hobby-edit").addEventListener("click", () => {
    document.querySelector(".hero-card","post-row").style.display = "none" ;
})

//hobby show 
document.querySelector(".hobby-show").addEventListener("click", () => {
    document.querySelector(".hobby-single-story-post").style.display = "flex" ;
}) 

// hobby add
document.querySelector(".hobby-add").addEventListener("click", () => {
    document.querySelector(".hobby-click").style.display = "flex" ;
}) 

// education
document.querySelector(".hobby-sign").addEventListener("click", () => {
    document.querySelector(".single-form").style.display = "inline-block" ;
})

document.querySelector(".hobby-sign").addEventListener("click", () => {
    document.querySelector(".hobby-post-form").style.display = "none" ;
})

// education form
document.querySelector(".education").addEventListener("click", () => {
    document.querySelector(".education-form").style.display = "inline-block" ;
})

document.querySelector(".education").addEventListener("click", () => {
    document.querySelector(".hobby-post-form").style.display = "none" ;
})

// job form
document.querySelector(".job").addEventListener("click", () => {
    document.querySelector(".job-form").style.display = "inline-block" ;
})

document.querySelector(".job").addEventListener("click", () => {
    document.querySelector(".hobby-post-form").style.display = "none" ;
})

// location form
document.querySelector(".location").addEventListener("click", () => {
    document.querySelector(".location-form").style.display = "inline-block" ;
})

document.querySelector(".location").addEventListener("click", () => {
    document.querySelector(".hobby-post-form").style.display = "none" ;
})

// sport form
document.querySelector(".sport").addEventListener("click", () => {
    document.querySelector(".sport-form").style.display = "inline-block" ;
})

document.querySelector(".sport").addEventListener("click", () => {
    document.querySelector(".hobby-post-form").style.display = "none" ;
})

// tipsfotm
document.querySelector(".tips").addEventListener("click", () => {
    document.querySelector(".tips-form").style.display = "inline-block" ;
})

document.querySelector(".tips").addEventListener("click", () => {
    document.querySelector(".hobby-post-form").style.display = "none" ;
})

// post gear section
function show() {
    document.querySelector(".gear-show").style.display = "flex" ;
}


// update bio
document.querySelector(".update-bio").addEventListener("click", () => {
    document.querySelector(".bio-update").style.display = "flex" ;
})


// comfirm password
document.querySelector("#button").onclick = function () {
    var password = document.querySelector("#password").value,
        cmpassword = document.querySelector("#cmf-password").value ;

        if(password == "") {
            alert("Field cannot be empty") ;
        }
        else if(password != cmpassword) {
            alert("Password does not match") ;
            return false ;
        }
        else if(password == cmpassword) {
            alert("Password Match") ;
        }
        return true ;
}














