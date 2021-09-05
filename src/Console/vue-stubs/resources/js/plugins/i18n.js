import { createI18n } from 'vue-i18n'
import messages from '@intlify/vite-plugin-vue-i18n/messages'

export const i18n = createI18n({
  legacy: false,
  globalInjection: true,
  missingWarn: false,
  locale: Config.meta.locale,
  fallbackLocale: 'en',
  messages,
})
