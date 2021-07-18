import { HomeIcon } from '@heroicons/vue/outline'

export const Nav = [
  {'label': 'Dashboard', 'count': 1, 'uri': '/', 'icon': HomeIcon},
  // {'label': 'Job', 'count': 2, 'uri': '/jobs', 'icon': FolderIcon, 'add': '/jobs/create', 'permission': 'job:view', 'createPermission': 'job:create'},
]

// Collapsible Nav
// export const Nav = [
//   {'label': 'Dashboard', 'count': 1, 'uri': '/', 'icon': HomeIcon},
//   {'label': 'Customer', 'count': 2, 'uri': '/customers', 'icon': GlobeIcon, 'add': '/customers/create', 'createPermission': 'customer:create'},
//   {
//     'label': 'Finance',
//     'icon': CashIcon,
//     'items': [
//       {'label': 'Invoice', 'count': 2, 'uri': '/invoices'},
//     ]
//   },
// ]
