plugin.tx_linkhandler {
  tx_org_cal {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.calendar}
    additionalParams = &tx_browser_pi1[calendarUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_downloads {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.downloads}
    additionalParams = &tx_browser_pi1[downloadsUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_event {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.event}
    additionalParams = &tx_browser_pi1[eventUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_headquarters {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.headquarters}
    additionalParams = &tx_browser_pi1[headquarterUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_job {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.job}
    additionalParams = &tx_browser_pi1[jobUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_location {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.location}
    additionalParams = &tx_browser_pi1[locationUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_news {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.news}
    additionalParams = &tx_browser_pi1[newsUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_service {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.service}
    additionalParams = &tx_browser_pi1[serviceUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
  tx_org_staff {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.staff}
    additionalParams = &tx_browser_pi1[staffUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
}