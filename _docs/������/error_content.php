array(7) {
  [0]=>
  array(7) {
    ["file"]=>
    string(91) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users/controllers/registration.php"
    ["line"]=>
    int(146)
    ["function"]=>
    string(8) "register"
    ["class"]=>
    string(22) "UsersModelRegistration"
    ["object"]=>
    object(UsersModelRegistration)#207 (12) {
      ["data:protected"]=>
      object(stdClass)#200 (5) {
        ["name"]=>
        string(10) "Толик"
        ["username"]=>
        string(6) "toljan"
        ["email1"]=>
        string(20) "totalitarist@mail.ru"
        ["email2"]=>
        string(20) "totalitarist@mail.ru"
        ["groups"]=>
        array(1) {
          [0]=>
          string(1) "2"
        }
      }
      ["forms:protected"]=>
      array(0) {
      }
      ["_forms:protected"]=>
      array(1) {
        ["eb2bf12e6feda761f0421398ae293057"]=>
        object(JForm)#205 (5) {
          ["data:protected"]=>
          object(JRegistry)#204 (1) {
            ["data:protected"]=>
            object(stdClass)#203 (4) {
              ["name"]=>
              string(10) "Толик"
              ["username"]=>
              string(6) "toljan"
              ["email1"]=>
              string(20) "totalitarist@mail.ru"
              ["email2"]=>
              string(20) "totalitarist@mail.ru"
            }
          }
          ["errors:protected"]=>
          array(0) {
          }
          ["name:protected"]=>
          string(22) "com_users.registration"
          ["options:protected"]=>
          array(1) {
            ["control"]=>
            string(5) "jform"
          }
          ["xml:protected"]=>
          object(JXMLElement)#202 (1) {
            ["fieldset"]=>
            object(JXMLElement)#201 (2) {
              ["@attributes"]=>
              array(2) {
                ["name"]=>
                string(7) "default"
                ["label"]=>
                string(36) "COM_USERS_REGISTRATION_DEFAULT_LABEL"
              }
              ["field"]=>
              array(8) {
                [0]=>
                object(JXMLElement)#180 (1) {
                  ["@attributes"]=>
                  array(4) {
                    ["name"]=>
                    string(6) "spacer"
                    ["type"]=>
                    string(6) "spacer"
                    ["class"]=>
                    string(4) "text"
                    ["label"]=>
                    string(27) "COM_USERS_REGISTER_REQUIRED"
                  }
                }
                [1]=>
                object(JXMLElement)#228 (1) {
                  ["@attributes"]=>
                  array(8) {
                    ["name"]=>
                    string(4) "name"
                    ["type"]=>
                    string(4) "text"
                    ["description"]=>
                    string(28) "COM_USERS_REGISTER_NAME_DESC"
                    ["filter"]=>
                    string(6) "string"
                    ["label"]=>
                    string(29) "COM_USERS_REGISTER_NAME_LABEL"
                    ["message"]=>
                    string(31) "COM_USERS_REGISTER_NAME_MESSAGE"
                    ["required"]=>
                    string(4) "true"
                    ["size"]=>
                    string(2) "30"
                  }
                }
                [2]=>
                object(JXMLElement)#229 (1) {
                  ["@attributes"]=>
                  array(10) {
                    ["name"]=>
                    string(8) "username"
                    ["type"]=>
                    string(4) "text"
                    ["class"]=>
                    string(17) "validate-username"
                    ["description"]=>
                    string(26) "COM_USERS_DESIRED_USERNAME"
                    ["filter"]=>
                    string(8) "username"
                    ["label"]=>
                    string(33) "COM_USERS_REGISTER_USERNAME_LABEL"
                    ["message"]=>
                    string(35) "COM_USERS_REGISTER_USERNAME_MESSAGE"
                    ["required"]=>
                    string(4) "true"
                    ["size"]=>
                    string(2) "30"
                    ["validate"]=>
                    string(8) "username"
                  }
                }
                [3]=>
                object(JXMLElement)#230 (1) {
                  ["@attributes"]=>
                  array(12) {
                    ["name"]=>
                    string(9) "password1"
                    ["type"]=>
                    string(8) "password"
                    ["autocomplete"]=>
                    string(3) "off"
                    ["class"]=>
                    string(17) "validate-password"
                    ["description"]=>
                    string(26) "COM_USERS_DESIRED_PASSWORD"
                    ["field"]=>
                    string(9) "password2"
                    ["filter"]=>
                    string(3) "raw"
                    ["label"]=>
                    string(34) "COM_USERS_REGISTER_PASSWORD1_LABEL"
                    ["message"]=>
                    string(36) "COM_USERS_REGISTER_PASSWORD1_MESSAGE"
                    ["required"]=>
                    string(4) "true"
                    ["size"]=>
                    string(2) "30"
                    ["validate"]=>
                    string(6) "equals"
                  }
                }
                [4]=>
                object(JXMLElement)#231 (1) {
                  ["@attributes"]=>
                  array(10) {
                    ["name"]=>
                    string(9) "password2"
                    ["type"]=>
                    string(8) "password"
                    ["autocomplete"]=>
                    string(3) "off"
                    ["class"]=>
                    string(17) "validate-password"
                    ["description"]=>
                    string(33) "COM_USERS_REGISTER_PASSWORD2_DESC"
                    ["filter"]=>
                    string(3) "raw"
                    ["label"]=>
                    string(34) "COM_USERS_REGISTER_PASSWORD2_LABEL"
                    ["message"]=>
                    string(36) "COM_USERS_REGISTER_PASSWORD2_MESSAGE"
                    ["required"]=>
                    string(4) "true"
                    ["size"]=>
                    string(2) "30"
                  }
                }
                [5]=>
                object(JXMLElement)#232 (1) {
                  ["@attributes"]=>
                  array(11) {
                    ["name"]=>
                    string(6) "email1"
                    ["type"]=>
                    string(5) "email"
                    ["description"]=>
                    string(30) "COM_USERS_REGISTER_EMAIL1_DESC"
                    ["field"]=>
                    string(2) "id"
                    ["filter"]=>
                    string(6) "string"
                    ["label"]=>
                    string(31) "COM_USERS_REGISTER_EMAIL1_LABEL"
                    ["message"]=>
                    string(33) "COM_USERS_REGISTER_EMAIL1_MESSAGE"
                    ["required"]=>
                    string(4) "true"
                    ["size"]=>
                    string(2) "30"
                    ["unique"]=>
                    string(4) "true"
                    ["validate"]=>
                    string(5) "email"
                  }
                }
                [6]=>
                object(JXMLElement)#233 (1) {
                  ["@attributes"]=>
                  array(10) {
                    ["name"]=>
                    string(6) "email2"
                    ["type"]=>
                    string(5) "email"
                    ["description"]=>
                    string(30) "COM_USERS_REGISTER_EMAIL2_DESC"
                    ["field"]=>
                    string(6) "email1"
                    ["filter"]=>
                    string(6) "string"
                    ["label"]=>
                    string(31) "COM_USERS_REGISTER_EMAIL2_LABEL"
                    ["message"]=>
                    string(33) "COM_USERS_REGISTER_EMAIL2_MESSAGE"
                    ["required"]=>
                    string(4) "true"
                    ["size"]=>
                    string(2) "30"
                    ["validate"]=>
                    string(6) "equals"
                  }
                }
                [7]=>
                object(JXMLElement)#234 (1) {
                  ["@attributes"]=>
                  array(5) {
                    ["name"]=>
                    string(7) "captcha"
                    ["type"]=>
                    string(7) "captcha"
                    ["label"]=>
                    string(23) "COM_USERS_CAPTCHA_LABEL"
                    ["description"]=>
                    string(22) "COM_USERS_CAPTCHA_DESC"
                    ["validate"]=>
                    string(7) "captcha"
                  }
                }
              }
            }
          }
        }
      }
      ["stateSet:protected"]=>
      NULL
      ["__state_set:protected"]=>
      NULL
      ["db:protected"]=>
      NULL
      ["_db:protected"]=>
      object(JDatabaseMySQL)#15 (18) {
        ["name"]=>
        string(5) "mysql"
        ["nameQuote:protected"]=>
        string(1) "`"
        ["nullDate:protected"]=>
        string(19) "0000-00-00 00:00:00"
        ["_database:private"]=>
        string(16) "a2allcom_fastweb"
        ["connection:protected"]=>
        resource(30) of type (mysql link)
        ["count:protected"]=>
        int(0)
        ["cursor:protected"]=>
        bool(true)
        ["debug:protected"]=>
        bool(false)
        ["limit:protected"]=>
        int(0)
        ["log:protected"]=>
        array(0) {
        }
        ["offset:protected"]=>
        int(0)
        ["sql:protected"]=>
        object(JDatabaseQueryMySQL)#223 (17) {
          ["db:protected"]=>
          *RECURSION*
          ["type:protected"]=>
          string(6) "insert"
          ["element:protected"]=>
          NULL
          ["select:protected"]=>
          NULL
          ["delete:protected"]=>
          NULL
          ["update:protected"]=>
          NULL
          ["insert:protected"]=>
          object(JDatabaseQueryElement)#224 (3) {
            ["name:protected"]=>
            string(11) "INSERT INTO"
            ["elements:protected"]=>
            array(1) {
              [0]=>
              string(23) "`#__user_usergroup_map`"
            }
            ["glue:protected"]=>
            string(1) ","
          }
          ["from:protected"]=>
          NULL
          ["join:protected"]=>
          NULL
          ["set:protected"]=>
          NULL
          ["where:protected"]=>
          NULL
          ["group:protected"]=>
          NULL
          ["having:protected"]=>
          NULL
          ["columns:protected"]=>
          object(JDatabaseQueryElement)#225 (3) {
            ["name:protected"]=>
            string(2) "()"
            ["elements:protected"]=>
            array(2) {
              [0]=>
              string(9) "`user_id`"
              [1]=>
              string(10) "`group_id`"
            }
            ["glue:protected"]=>
            string(1) ","
          }
          ["values:protected"]=>
          object(JDatabaseQueryElement)#226 (3) {
            ["name:protected"]=>
            string(2) "()"
            ["elements:protected"]=>
            array(1) {
              [0]=>
              string(5) "50, 2"
            }
            ["glue:protected"]=>
            string(3) "),("
          }
          ["order:protected"]=>
          NULL
          ["autoIncrementField:protected"]=>
          bool(false)
        }
        ["tablePrefix:protected"]=>
        string(6) "dnior_"
        ["utf:protected"]=>
        bool(true)
        ["errorNum:protected"]=>
        int(0)
        ["errorMsg:protected"]=>
        string(0) ""
        ["hasQuoted:protected"]=>
        bool(false)
        ["quoted:protected"]=>
        array(0) {
        }
      }
      ["name:protected"]=>
      string(12) "registration"
      ["option:protected"]=>
      string(9) "com_users"
      ["state:protected"]=>
      object(JObject)#206 (2) {
        ["_errors:protected"]=>
        array(0) {
        }
        ["task"]=>
        string(8) "register"
      }
      ["event_clean_cache:protected"]=>
      string(19) "onContentCleanCache"
      ["_errors:protected"]=>
      array(0) {
      }
    }
    ["type"]=>
    string(2) "->"
    ["args"]=>
    array(1) {
      [0]=>
      &array(6) {
        ["name"]=>
        string(10) "Толик"
        ["username"]=>
        string(6) "toljan"
        ["password1"]=>
        string(7) "history"
        ["password2"]=>
        string(7) "history"
        ["email1"]=>
        string(20) "totalitarist@mail.ru"
        ["email2"]=>
        string(20) "totalitarist@mail.ru"
      }
    }
  }
  [1]=>
  array(7) {
    ["file"]=>
    string(95) "/home/a2allcom/data/www/2-all.com/webapps/libraries/joomla/application/component/controller.php"
    ["line"]=>
    int(754)
    ["function"]=>
    string(8) "register"
    ["class"]=>
    string(27) "UsersControllerRegistration"
    ["object"]=>
    object(UsersControllerRegistration)#168 (15) {
      ["_acoSection:protected"]=>
      NULL
      ["_acoSectionValue:protected"]=>
      NULL
      ["basePath:protected"]=>
      string(62) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users"
      ["default_view:protected"]=>
      string(5) "users"
      ["doTask:protected"]=>
      string(8) "register"
      ["message:protected"]=>
      NULL
      ["messageType:protected"]=>
      string(7) "message"
      ["methods:protected"]=>
      array(3) {
        [0]=>
        string(8) "activate"
        [1]=>
        string(8) "register"
        [2]=>
        string(7) "display"
      }
      ["name:protected"]=>
      string(5) "users"
      ["model_prefix:protected"]=>
      string(10) "usersModel"
      ["paths:protected"]=>
      array(1) {
        ["view"]=>
        array(1) {
          [0]=>
          string(69) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users/views/"
        }
      }
      ["redirect:protected"]=>
      NULL
      ["task:protected"]=>
      string(8) "register"
      ["taskMap:protected"]=>
      array(4) {
        ["activate"]=>
        string(8) "activate"
        ["register"]=>
        string(8) "register"
        ["display"]=>
        string(7) "display"
        ["__default"]=>
        string(7) "display"
      }
      ["_errors:protected"]=>
      array(0) {
      }
    }
    ["type"]=>
    string(2) "->"
    ["args"]=>
    array(0) {
    }
  }
  [2]=>
  array(7) {
    ["file"]=>
    string(72) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users/users.php"
    ["line"]=>
    int(17)
    ["function"]=>
    string(7) "execute"
    ["class"]=>
    string(11) "JController"
    ["object"]=>
    object(UsersControllerRegistration)#168 (15) {
      ["_acoSection:protected"]=>
      NULL
      ["_acoSectionValue:protected"]=>
      NULL
      ["basePath:protected"]=>
      string(62) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users"
      ["default_view:protected"]=>
      string(5) "users"
      ["doTask:protected"]=>
      string(8) "register"
      ["message:protected"]=>
      NULL
      ["messageType:protected"]=>
      string(7) "message"
      ["methods:protected"]=>
      array(3) {
        [0]=>
        string(8) "activate"
        [1]=>
        string(8) "register"
        [2]=>
        string(7) "display"
      }
      ["name:protected"]=>
      string(5) "users"
      ["model_prefix:protected"]=>
      string(10) "usersModel"
      ["paths:protected"]=>
      array(1) {
        ["view"]=>
        array(1) {
          [0]=>
          string(69) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users/views/"
        }
      }
      ["redirect:protected"]=>
      NULL
      ["task:protected"]=>
      string(8) "register"
      ["taskMap:protected"]=>
      array(4) {
        ["activate"]=>
        string(8) "activate"
        ["register"]=>
        string(8) "register"
        ["display"]=>
        string(7) "display"
        ["__default"]=>
        string(7) "display"
      }
      ["_errors:protected"]=>
      array(0) {
      }
    }
    ["type"]=>
    string(2) "->"
    ["args"]=>
    array(1) {
      [0]=>
      &string(8) "register"
    }
  }
  [3]=>
  array(4) {
    ["file"]=>
    string(91) "/home/a2allcom/data/www/2-all.com/webapps/libraries/joomla/application/component/helper.php"
    ["line"]=>
    int(388)
    ["args"]=>
    array(1) {
      [0]=>
      string(72) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users/users.php"
    }
    ["function"]=>
    string(12) "require_once"
  }
  [4]=>
  array(6) {
    ["file"]=>
    string(91) "/home/a2allcom/data/www/2-all.com/webapps/libraries/joomla/application/component/helper.php"
    ["line"]=>
    int(357)
    ["function"]=>
    string(16) "executeComponent"
    ["class"]=>
    string(16) "JComponentHelper"
    ["type"]=>
    string(2) "::"
    ["args"]=>
    array(1) {
      [0]=>
      &string(72) "/home/a2allcom/data/www/2-all.com/webapps/components/com_users/users.php"
    }
  }
  [5]=>
  array(6) {
    ["file"]=>
    string(66) "/home/a2allcom/data/www/2-all.com/webapps/includes/application.php"
    ["line"]=>
    int(187)
    ["function"]=>
    string(15) "renderComponent"
    ["class"]=>
    string(16) "JComponentHelper"
    ["type"]=>
    string(2) "::"
    ["args"]=>
    array(1) {
      [0]=>
      &string(9) "com_users"
    }
  }
  [6]=>
  array(7) {
    ["file"]=>
    string(51) "/home/a2allcom/data/www/2-all.com/webapps/index.php"
    ["line"]=>
    int(118)
    ["function"]=>
    string(8) "dispatch"
    ["class"]=>
    string(5) "JSite"
    ["object"]=>
    object(JSite)#3 (14) {
      ["template:private"]=>
      object(stdClass)#186 (4) {
        ["id"]=>
        string(1) "8"
        ["home"]=>
        string(1) "1"
        ["template"]=>
        string(10) "fastwebdev"
        ["params"]=>
        object(JRegistry)#184 (1) {
          ["data:protected"]=>
          object(stdClass)#185 (0) {
          }
        }
      }
      ["_language_filter:private"]=>
      bool(false)
      ["_detect_browser:private"]=>
      bool(false)
      ["clientId:protected"]=>
      NULL
      ["_clientId:protected"]=>
      int(0)
      ["messageQueue:protected"]=>
      array(0) {
      }
      ["_messageQueue:protected"]=>
      array(1) {
        [0]=>
        array(2) {
          ["message"]=>
          string(55) "Не удалось вызвать функцию mail."
          ["type"]=>
          string(6) "notice"
        }
      }
      ["name:protected"]=>
      NULL
      ["_name:protected"]=>
      string(4) "site"
      ["scope"]=>
      string(9) "com_users"
      ["requestTime"]=>
      string(16) "2012-05-26 09:41"
      ["startTime"]=>
      float(1338025260.7212)
      ["input"]=>
      object(JInput)#9 (4) {
        ["options:protected"]=>
        array(0) {
        }
        ["filter:protected"]=>
        object(JFilterInput)#10 (8) {
          ["tagsArray"]=>
          array(0) {
          }
          ["attrArray"]=>
          array(0) {
          }
          ["tagsMethod"]=>
          int(0)
          ["attrMethod"]=>
          int(0)
          ["xssAuto"]=>
          int(1)
          ["tagBlacklist"]=>
          array(22) {
            [0]=>
            string(6) "applet"
            [1]=>
            string(4) "body"
            [2]=>
            string(7) "bgsound"
            [3]=>
            string(4) "base"
            [4]=>
            string(8) "basefont"
            [5]=>
            string(5) "embed"
            [6]=>
            string(5) "frame"
            [7]=>
            string(8) "frameset"
            [8]=>
            string(4) "head"
            [9]=>
            string(4) "html"
            [10]=>
            string(2) "id"
            [11]=>
            string(6) "iframe"
            [12]=>
            string(6) "ilayer"
            [13]=>
            string(5) "layer"
            [14]=>
            string(4) "link"
            [15]=>
            string(4) "meta"
            [16]=>
            string(4) "name"
            [17]=>
            string(6) "object"
            [18]=>
            string(6) "script"
            [19]=>
            string(5) "style"
            [20]=>
            string(5) "title"
            [21]=>
            string(3) "xml"
          }
          ["attrBlacklist"]=>
          array(5) {
            [0]=>
            string(6) "action"
            [1]=>
            string(10) "background"
            [2]=>
            string(8) "codebase"
            [3]=>
            string(6) "dynsrc"
            [4]=>
            string(6) "lowsrc"
          }
          ["_errors:protected"]=>
          array(0) {
          }
        }
        ["data:protected"]=>
        &array(6) {
          ["task"]=>
          string(8) "register"
          ["jform"]=>
          array(6) {
            ["name"]=>
            string(10) "Толик"
            ["username"]=>
            string(6) "toljan"
            ["password1"]=>
            string(7) "history"
            ["password2"]=>
            string(7) "history"
            ["email1"]=>
            string(20) "totalitarist@mail.ru"
            ["email2"]=>
            string(20) "totalitarist@mail.ru"
          }
          ["option"]=>
          string(9) "com_users"
          ["0b2a18e371a53c0c844357fd32ff1e90"]=>
          string(1) "1"
          ["ab5bbbc2ae2ea8f7844c3b83c26283bb"]=>
          string(32) "5f64f70bca1dae32018e8a1822bc9f77"
          ["Itemid"]=>
          NULL
        }
        ["inputs:protected"]=>
        array(0) {
        }
      }
      ["_errors:protected"]=>
      array(0) {
      }
    }
    ["type"]=>
    string(2) "->"
    ["args"]=>
    array(0) {
    }
  }
}