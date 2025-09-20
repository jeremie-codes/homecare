/**
 * Main JavaScript file for common functionality
 * Enhanced with advanced theme and layout management
 */

;(function () {
    'use strict'
  
    // Set assets path and layout path variables
    window.assetsPath = document.documentElement.getAttribute('data-assets-path')
    window.layoutPath = document.documentElement.getAttribute('data-layout-path')
    window.commonAssetsPath = 'common/'
  
    const root = document.documentElement
    const layoutPath = (root.getAttribute('data-layout-path') || 'dashboard-default').replace(/[\/\s]/g, '').trim()
    const localStorageKey = `${layoutPath}-theme`
  
    // Function to get current system theme preference
    const getSystemPreference = () => window.matchMedia('(prefers-color-scheme: dark)').matches
  
    // Function to resolve theme based on selected theme and layout configuration
    const resolveTheme = theme => {
      // Use more robust access pattern
      const layoutConfig = window.THEME_CONFIG && window.THEME_CONFIG[layoutPath] ? window.THEME_CONFIG[layoutPath] : null
  
      if (theme === 'system') {
        if (layoutConfig && layoutConfig.system) {
          const prefersDark = getSystemPreference()
          const resolvedTheme = prefersDark ? layoutConfig.system.dark : layoutConfig.system.light
  
          return resolvedTheme
        }
        // Fallback for layouts without system config - use layout's light/dark themes if available
        if (layoutConfig) {
          const prefersDark = getSystemPreference()
          const resolvedTheme = prefersDark ? layoutConfig.dark || 'dark' : layoutConfig.light || 'light'
  
          return resolvedTheme
        }
        // Final fallback if no layout config exists
        const resolvedTheme = getSystemPreference() ? 'dark' : 'light'
  
        return resolvedTheme
      }
  
      // Check if layout has theme mapping
      if (layoutConfig) {
        const resolvedTheme = layoutConfig[theme] || theme || layoutConfig.default || 'light'
  
        return resolvedTheme
      }
  
      return theme
    }
  
    // Apply selected theme and update dropdown UI
    const applyTheme = themeValue => {
      const finalTheme = resolveTheme(themeValue)
      root.setAttribute('data-theme', finalTheme)
      localStorage.setItem(localStorageKey, themeValue)
  
      // Update dropdown active state
      document.querySelectorAll('[data-theme-value]').forEach(btn => {
        const isActive = btn.getAttribute('data-theme-value') === themeValue
        btn.classList.toggle('dropdown-active', isActive)
        btn.setAttribute('aria-pressed', isActive)
      })
  
      // Toggle icon visibility
      const activeBtn = document.querySelector(`[data-theme-value="${themeValue}"]`)
      const iconName = activeBtn?.getAttribute('data-icon') || 'sun-moon'
      document.querySelectorAll('.theme-icon').forEach(iconEl => {
        if (iconEl.classList.contains(`icon-[tabler--${iconName}]`)) {
          iconEl.classList.remove('hidden')
        } else {
          iconEl.classList.add('hidden')
        }
      })
    }
  
    // Get saved theme or default to 'system'
    const savedTheme = localStorage.getItem(localStorageKey) || 'system'
    applyTheme(savedTheme)
  
    // Bind dropdown click handlers
    document.querySelectorAll('[data-theme-value]').forEach(btn => {
      btn.addEventListener('click', () => {
        const selectedTheme = btn.getAttribute('data-theme-value')
        applyTheme(selectedTheme)
      })
    })
  
    // Listen to system theme changes (live update if in 'system' mode)
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
      const currentTheme = localStorage.getItem(localStorageKey)
      if (currentTheme === 'system') {
        // Force recalculation of the system theme fallback
        applyTheme('system')
      }
    })
  })()
  
  window.addEventListener('load', () => {
    setTimeout(() => {
      const path = window.location.pathname
      const pageName = path.substring(path.lastIndexOf('/') + 1)
      const currentLink =
        document.querySelector(`[data-combo-box-output-item] a[href*="/${pageName}"]`) ||
        document.querySelector(`[data-combo-box-output-item] a[href*="${pageName}"]`)
  
      if (currentLink) {
        currentLink.classList.add('dropdown-active')
        currentLink.closest('[data-combo-box-output-item]').classList.add('combo-box-output-item-highlighted')
      }
  
      closeAndClearCombobox()
    }, 200)
  
    // Get scrollbar width
    function getScrollbarWidth() {
      const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth
      document.body.style.setProperty('--bs-scrollbar-width', `${scrollbarWidth}px`)
    }
    getScrollbarWidth()
  })
  
  function clearSearchbox(combobox) {
    combobox.element.close('')
    combobox.element.setItemsVisibility()
  }
  
  function closeAndClearCombobox() {
    const searchOverlay = HSOverlay.getInstance('#search-modal', true)
    const searchCombobox = HSComboBox.getInstance('#search-modal [data-combo-box]', true)
    const clear = document.querySelector('#searchbox-clear')
    const input = document.querySelector('#search-modal [data-combo-box] input')
  
    if (!searchOverlay || !searchCombobox || !clear) return
  
    searchOverlay.element.on('open', () => {
      document.body.style.paddingInlineEnd = 'var(--bs-scrollbar-width)'
    })
  
    window.addEventListener('keydown', function (evt) {
      if (evt.code === 'KeyK' && (evt.ctrlKey || evt.metaKey)) {
        if (searchOverlay.element && searchOverlay.element.el.classList.contains('open')) return false
  
        searchOverlay.element.open()
        searchCombobox.element.setCurrent()
      }
  
      // Global Enter key handler for search modal
      if (evt.key === 'Enter' && searchOverlay.element && searchOverlay.element.el.classList.contains('open')) {
        const highlightedItem =
          document.querySelector('#search-modal [data-combo-box-output-item].combo-box-output-item-highlighted') ||
          document
            .querySelector('#search-modal [data-combo-box-output-item] a:focus')
            ?.closest('[data-combo-box-output-item]') ||
          document.querySelector('#search-modal li[data-combo-box-output-item]:focus-within')
  
        if (highlightedItem) {
          evt.preventDefault()
          evt.stopPropagation()
  
          const linkElement = highlightedItem.querySelector('a[href]')
          if (linkElement && linkElement.href && linkElement.href !== '#') {
            searchOverlay.element.close()
            clearSearchbox(searchCombobox)
            setTimeout(() => {
              window.location.href = linkElement.href
            }, 100)
          }
        }
      }
    })
    if (input) {
      input.addEventListener('focus', () => {
        searchCombobox.element.setCurrent()
      })
  
      input.addEventListener('keydown', evt => {
        if (evt.key === 'ArrowDown') {
          evt.preventDefault()
          if (searchCombobox && searchCombobox.element && typeof searchCombobox.element.next === 'function') {
            searchCombobox.element.next()
          }
        } else if (evt.key === 'ArrowUp') {
          evt.preventDefault()
          if (searchCombobox && searchCombobox.element && typeof searchCombobox.element.previous === 'function') {
            searchCombobox.element.previous()
          }
        }
      })
    }
  
    if (searchOverlay) {
      document.addEventListener('open.hs.overlay', ({ detail }) => {
        if (detail.payload.getAttribute('data-overlay') === '#search-modal') searchCombobox.element.setCurrent()
        return false
      })
  
      searchOverlay.element.on('close', () => {
        clearSearchbox(searchCombobox)
        document.body.style.paddingInlineEnd = ''
      })
    }
  
    clear.addEventListener('click', () => clearSearchbox(searchCombobox))
  }