from bs4 import BeautifulSoup
import requests
import re
import json

def search(url, source, results):
    data = requests.get(url)
    data = data.content
    soup = BeautifulSoup(data, "html.parser")
    
    article_links = []
    if source == "cnbcindonesia":
        articles = soup.find_all("article")
        for article in articles:
            link = article.find("a", href=True)
            if link and 'href' in link.attrs:
                article_url = link['href']
                if article_url.startswith('/'):
                    article_url = url.split('/tech/')[0] + article_url
                article_links.append(article_url)
                
    elif source == "cnnindonesia":
        articles = soup.find_all("article")
        for article in articles:
            link = article.find("a", href=True)
            if link and 'href' in link.attrs:
                article_url = link['href']
                if article_url.startswith('/'):
                    article_url = url.split('/teknologi/')[0] + article_url
                elif article_url.startswith('#'):
                    continue  # Skip invalid URLs
                article_links.append(article_url)
                
    elif source == "liputan6":
        articles = soup.find_all("a", {"class": "articles--iridescent-list--text-item__title-link"})
        for article in articles:
            article_links.append(article['href'])
    
    for link in article_links:
        if not link.startswith('http'):
            link = url.rstrip('/') + link
        getNews(link, source, results)

def getNews(url, source, results):
    try:
        data = requests.get(url)
        data = data.content
        soup = BeautifulSoup(data, "html.parser")
        
        title = getContent(soup.find("meta", {"property": "og:title"}))
        url = getContent(soup.find("meta", {"property": "og:url"}))
        image = getContent(soup.find("meta", {"property": "og:image"}))
        author = getContent(soup.find("meta", {"name": "author"}))
        if source == "cnbcindonesia":
            news = parseNews(soup.find("div", {"class": "mdk-body-paragpraph"}))
        elif source == "cnnindonesia":
            news = parseNews(soup.find("div", {"class": "detail_text"}))
        elif source == "liputan6":
            news = parseNews(soup.find("div", {"class": "article-content-body__item-content"}))
        
        result = {
            "title": title,
            "url": url,
            "image": image,
            "author": author,
            "news": news
        }

        results.append(result)
    except requests.exceptions.MissingSchema:
        print(f"Invalid URL: {url}")
    except Exception as e:
        print(f"Error processing {url}: {e}")

def parseNews(html):
    if html is None:
        return None
    
    s = []
    for i in html.get_text().split("\n"):
        if i.strip():
            i = re.sub(" \[(.*?)]", "", i)
            s.append(i)
    s = '\n'.join(map(str, s))
    return s

def getContent(html):
    if html and 'content' in html.attrs:
        return html['content']
    return None

if __name__ == "__main__":
    sources = {
        "cnbcindonesia": "https://www.cnbcindonesia.com/tech/",
        "cnnindonesia": "https://www.cnnindonesia.com/teknologi",
        "liputan6": "https://www.liputan6.com/tekno/berita"
    }
    
    results = []
    for source, url in sources.items():
        search(url, source, results)
    
    with open("articles.json", "w") as f:
        json.dump(results, f, indent=4)
