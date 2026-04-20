import api from '../utils/api'

const GOLDAPI_KEY = 'goldapi-c6619mnxc7avw-io'



export interface GoldPrice {
    current: number
    change: number
    changePercent: number
    high: number
    low: number
    open: number
    prevClose: number
    priceGram24k: number
    priceGram22k: number
    priceGram18k: number
    currency: string
    updatedAt: string
}

export interface BRVMData {
    index: number
    change: number
    changePercent: number
    volume: number
    listed_companies: number
    market_cap: number
    updatedAt: string
}

export interface MacroIndicator {
    value: string
    date: string
}


function parseNumber(raw: string): number {
    return parseFloat(raw.replace(/\s/g, '').replace(',', '.')) || 0
}

export interface NewsItem {
    title: string
    url: string
    description: string
    date: string
    source: string
    image: string | null
}


export const financeService = {

    async getGoldPrice(currency = 'USD'): Promise<GoldPrice> {
        const res = await fetch(`https://www.goldapi.io/api/XAU/${currency}`, {
            headers: {
                'x-access-token': GOLDAPI_KEY,
                'Content-Type': 'application/json',
            },
        })

        if (!res.ok) throw new Error(`GoldAPI erreur ${res.status}`)

        const d = await res.json()

        if (!d.price) throw new Error('GoldAPI : quota atteint ou clé invalide')

        return {
            current: d.price,
            change: d.ch ?? 0,
            changePercent: d.chp ?? 0,
            high: d.high_price ?? 0,
            low: d.low_price ?? 0,
            open: d.open_price ?? 0,
            prevClose: d.prev_close_price ?? 0,
            priceGram24k: d.price_gram_24k ?? 0,
            priceGram22k: d.price_gram_22k ?? 0,
            priceGram18k: d.price_gram_18k ?? 0,
            currency: `${currency}/oz`,
            updatedAt: new Date(d.timestamp * 1000).toISOString(),
        }
    },



    // ── 2. BRVM via scraping du site officiel ───────────────────────────────────
    async getBRVMData(): Promise<BRVMData> {
        const { data } = await api.get('/brvm/latest')

        if (!data.success) throw new Error('BRVM: ' + data.message)

        return {
            index: data.data.index,
            change: data.data.change,
            changePercent: data.data.changePercent,
            volume: data.data.volume,
            listed_companies: data.data.listed_companies,
            market_cap: data.data.market_cap,
            updatedAt: data.data.updatedAt,
        }
    },
    // ── 3. Banque Mondiale ──────────────────────────────────────────────────────
    async getMacroIndicator(
        indicator: 'GDP' | 'INFLATION',
        country = 'TGO'
    ): Promise<MacroIndicator> {
        const code = indicator === 'GDP' ? 'NY.GDP.MKTP.KD.ZG' : 'FP.CPI.TOTL.ZG'
        // N-2 garanti d'avoir une donnée consolidée
        const year = new Date().getFullYear() - 2
        const url = `https://api.worldbank.org/v2/country/${country}/indicator/${code}?format=json&date=${year}`

        try {
            const res = await fetch(url)
            const json = await res.json()

            const entry = json?.[1]?.[0]
            if (!entry?.value) throw new Error('Donnée manquante')

            return {
                value: parseFloat(entry.value).toFixed(1),
                date: entry.date,
            }
        } catch {
            return {
                value: indicator === 'GDP' ? '6.2' : '2.1',
                date: String(year),
            }
        }
    },

    async getNews(): Promise<NewsItem[]> {
        const { data } = await api.get('/news')
        if (!data.success) throw new Error('News: ' + data.message)
        return data.data
    },

    // ── 4. Toutes les données en une fois (pour Promise.all) ───────────────────
    async fetchAll() {
        const [gold, brvm, gdp, inflation, news] = await Promise.allSettled([
            this.getGoldPrice(),
            this.getBRVMData(),
            this.getMacroIndicator('GDP'),
            this.getMacroIndicator('INFLATION'),
            this.getNews(),
        ])

        return {
            gold: gold.status === 'fulfilled' ? gold.value : null,
            brvm: brvm.status === 'fulfilled' ? brvm.value : null,
            gdp: gdp.status === 'fulfilled' ? gdp.value : null,
            inflation: inflation.status === 'fulfilled' ? inflation.value : null,
            news: news.status === 'fulfilled' ? news.value : [],
        }
    },
}
