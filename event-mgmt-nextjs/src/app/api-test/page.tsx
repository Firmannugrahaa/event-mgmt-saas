"use client";

import { useState, useEffect } from "react";
import axios from "axios";

// Variabel Environment untuk URL Backend
const LARAVEL_API_URL =
  process.env.NEXT_PUBLIC_LARAVEL_API_URL || "http://localhost:8000/api/v1";

export default function ApiTestPage() {
  const [status, setStatus] = useState("Checking...");
  const [data, setData] = useState<any>({});
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    async function fetchApiStatus() {
      try {
        const response = await axios.get(`${LARAVEL_API_URL}/status`);
        setStatus(response.data.api_status.toUpperCase());
        setData(response.data);
      } catch (err) {
        setError("Failed to connect to Laravel API. Check CORS/Server.");
        setStatus("OFFLINE");
        console.error(err);
      }
    }
    fetchApiStatus();
  }, []);

  return (
    <div className="p-8 max-w-lg mx-auto bg-white shadow-lg rounded-xl mt-10">
      <h1 className="text-2xl font-bold mb-4">Laravel API Connection Test</h1>
      <p className="text-lg">
        Status:
        <span
          className={`font-extrabold ml-2 ${
            status === "ONLINE" ? "text-green-600" : "text-red-600"
          }`}
        >
          {status}
        </span>
      </p>

      {data && (
        <div className="mt-4 p-4 border rounded bg-gray-50">
          <p>
            Version: <code className="font-mono">{data.app_version}</code>
          </p>
          <p>
            Schema Path (Debug):{" "}
            <code className="font-mono">{data.tenant_schema}</code>
          </p>
        </div>
      )}

      {error && <p className="mt-4 text-red-500 font-medium">Error: {error}</p>}

      <p className="mt-6 text-sm text-gray-500">
        Pastikan server Laravel (`php artisan serve`) berjalan di port 8000.
      </p>
    </div>
  );
}
