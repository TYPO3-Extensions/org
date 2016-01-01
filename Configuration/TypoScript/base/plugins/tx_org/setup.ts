plugin.tx_org {
    // empty statement for proper comments below
  settings {
  }
    // constants
  settings =
  settings {
      // empty statement for proper comments below
    constants {
    }
      // pages, sysfolders
    constants =
    constants {
        // empty statement for proper comments below
      pages {
      }
        // root, calendar, calendar_expired, downloads, event, headquarters, job, jobApply, location, news, newsletter, service, shopping_cart, shopping_cart_downloads, staff, terms, terms_downloads, vCard
      pages =
      pages {
        root = TEXT
        root {
          value = {$plugin.org.pages.root}
        }
        calendar = TEXT
        calendar {
          value = {$plugin.org.pages.calendar}
        }
        calendar_expired = TEXT
        calendar_expired {
          value = {$plugin.org.pages.calendar_expired}
        }
        downloads = TEXT
        downloads {
          value = {$plugin.org.pages.downloads}
        }
        event = TEXT
        event {
          value = {$plugin.org.pages.event}
        }
        headquarters = TEXT
        headquarters {
          value = {$plugin.org.pages.headquarters}
        }
        job = TEXT
        job {
          value = {$plugin.org.pages.job}
        }
        jobApply = TEXT
        jobApply {
          value = {$plugin.org.pages.jobApply}
        }
        location = TEXT
        location {
          value = {$plugin.org.pages.location}
        }
        news = TEXT
        news {
          value = {$plugin.org.pages.news}
        }
        newsletter = TEXT
        newsletter {
          value = {$plugin.org.pages.newsletter}
        }
        service = TEXT
        service {
          value = {$plugin.org.pages.service}
        }
        shopping_cart = TEXT
        shopping_cart {
          value = {$plugin.org.pages.shopping_cart}
        }
        shopping_cart_downloads = TEXT
        shopping_cart_downloads {
          value = {$plugin.org.pages.shopping_cart_downloads}
        }
        staff = TEXT
        staff {
          value = {$plugin.org.pages.staff}
        }
        terms = TEXT
        terms {
          value = {$plugin.org.pages.terms}
        }
        terms_downloads = TEXT
        terms_downloads {
          value = {$plugin.org.pages.terms_downloads}
        }
        vCard = TEXT
        vCard {
          value = {$plugin.org.pages.vCard}
        }
      }
        // empty statement for proper comments below
      sysfolders {
      }
        // calendar, downloads, event, headquarters, job, location, news, newsSlider, service, staff
      sysfolders =
      sysfolders {
        calendar = TEXT
        calendar {
          value = {$plugin.org.sysfolder.calendar}
        }
        downloads = TEXT
        downloads {
          value = {$plugin.org.sysfolder.downloads}
        }
        event = TEXT
        event {
          value = {$plugin.org.sysfolder.event}
        }
        headquarters = TEXT
        headquarters {
          value = {$plugin.org.sysfolder.headquarters}
        }
        job = TEXT
        job {
          value = {$plugin.org.sysfolder.job}
        }
        location = TEXT
        location {
          value = {$plugin.org.sysfolder.location}
        }
        news = TEXT
        news {
          value = {$plugin.org.sysfolder.news}
        }
        newsSlider = TEXT
        newsSlider {
          value = {$plugin.org.sysfolder.newsSlider}
        }
        service = TEXT
        service {
        value = {$plugin.org.sysfolder.service}
        }
        staff = TEXT
        staff {
          value = {$plugin.org.sysfolder.staff}
        }
      }
    }
  }
}