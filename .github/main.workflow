workflow "New workflow" {
  on = "push"
  resolves = [
    "Deploy front-end to Heroku",
    "Deploy backend-end to Heroku",
  ]
}

action "Heroku login" {
  uses = "actions/heroku@master"
  args = "container:login"
  needs = "Add git remote urls"
  secrets = ["HEROKU_API_KEY"]
}

action "Add git remote urls" {
  uses = "TNkemdilim/git-actions@add-git-subtree"
  args = "git remote add heroku-fe ${HEROKU_FRONTEND} && git remote add heroku-be ${HEROKU_BACKEND}"
  env = {
    HEROKU_FRONTEND = "https://git.heroku.com/hostellier.git"
    HEROKU_BACKEND = "\nhttps://git.heroku.com/api-hostellier.git"
  }
}

action "Deploy front-end to Heroku" {
  uses = "TNkemdilim/git-actions@add-git-subtree"
  needs = "Heroku login"
  args = "git subtree push --prefix=hostellier-fe heroku-fe master"
}

action "Deploy backend-end to Heroku" {
  uses = "TNkemdilim/git-actions@add-git-subtree"
  needs = "Heroku login"
  args = "git subtree push --prefix=hostellier-be heroku-be master"
}

