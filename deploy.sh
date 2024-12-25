gcloud run deploy full-text-rss \
    --region=europe-west1 \
    --allow-unauthenticated \
    --execution-environment=gen2 \
    --port 80 \
    --source .