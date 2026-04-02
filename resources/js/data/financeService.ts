const API_KEY = 'FROSBG21G84SP6RU';

export const financeService = {
    // 1. Cours de l'Or (Alpha Vantage)
    async getGoldPrice() {
        const response = await fetch(`https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=XAUUSD&apikey=${API_KEY}`);
        const data = await response.json();
        const q = data['Global Quote'];
        if (!q) throw new Error("Erreur API Gold");

        return {
            current: parseFloat(q['05. price']),
            change: parseFloat(q['09. change']),
            changePercent: parseFloat(q['10. change percent'].replace('%', '')),
            high: parseFloat(q['03. high']),
            low: parseFloat(q['04. low'])
        };
    },

    // 2. Données BRVM (Simulation en attendant un scraper ou API réelle)
    async getBRVMData() {
        return {
            index: 224.67,
            change: 1.45,
            percent: 0.65,
            volume: 156000000,
            market_cap: 8200000000000
        };
    },

    // 3. Données Macro-économiques (Banque Mondiale)
    // On utilise 'TGO' pour le Togo ou 'WLD' pour le monde, 'ZF' pour l'Afrique Subsaharienne
    async getMacroIndicator(indicator: 'GDP' | 'INFLATION', country = 'TGO') {
        const code = indicator === 'GDP' ? 'NY.GDP.MKTP.KD.ZG' : 'FP.CPI.TOTL.ZG';
        const year = new Date().getFullYear() - 2; // On prend N-2 pour être sûr d'avoir une donnée consolidée

        const url = `https://api.worldbank.org/v2/country/${country}/indicator/${code}?format=json&date=${year}`;

        try {
            const res = await fetch(url);
            const json = await res.json();
            // La Banque Mondiale retourne [infos, données]
            return {
                value: json[1][0].value.toFixed(1),
                date: json[1][0].date
            };
        } catch (e) {
            return { value: indicator === 'GDP' ? '6.2' : '2.1', date: '2024' };
        }
    }
};
